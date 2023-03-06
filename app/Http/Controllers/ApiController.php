<?php

namespace App\Http\Controllers;

use App\Http\Requests\Interest\StoreInterestRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizPaper;
use App\Models\QuizUser;
use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Scalar\String_;
use function Sodium\add;

abstract class ApiController extends Controller
{
    protected $model;
    protected $itemResource;
    protected $collectionResource;
    protected $storeRequest;
    protected $updateRequest;
    protected $indexRequest;
    protected $showRequest;
    protected $destroyRequest;
    protected $table;
    protected $objects = [
        'questions' => ['clas' => Question::class, 'relationFunction' => 'quizQuestions']

    ];

    public abstract function getRequests();

    public function setExtraFields($model)
    {
        return $model;
    }


    public function setMinExtraFields($model)
    {
        return $model;
    }

    public function __construct($table, $collectionResource, $itemResource, $model)
    {
        $requests = $this->getRequests();

        $this->model = $model;
        $this->table = $table;
        $this->indexRequest = $requests['index'];
        $this->storeRequest = $requests['store'];
        $this->updateRequest = $requests['update'];
        $this->showRequest = $requests['show'];
        $this->destroyRequest = $requests['destroy'];
        $this->itemResource = $itemResource;
        $this->collectionResource = $collectionResource;
    }

    public function paginate(Builder $results): JsonResponse
    {
        $total = $results->count();
        $skip = request('skip', 0);
        $take = request('take', 10);

        return Response()->json([
            'page' => ceil($skip / $take),
            'total' => $total,
            'results' => $results->take($take)->skip($skip)->get(),
        ]);
    }

    public function response($data, $status = 200): JsonResponse
    {
        return Response()->json($data, $status);
    }

    public function response401($message = 'Unauthorized'): JsonResponse
    {
        return Response()->json($message, 401);
    }

    public function response404($message = 'Not Found'): JsonResponse
    {
        return Response()->json($message, 404);
    }

    public function validateRequest(Request $request, $childRequestClass)
    {
        if ($childRequestClass === Request::class)
            return;

        $childRequest = new $childRequestClass($request->all());
        $childRequest->validate($childRequest->rules());
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */

    public function index(Request $request): JsonResponse
    {

        $this->authorize('view', [Auth::user(), $this->model]);
        $elements = $this->modelQuery();

        $elements = $this->search($elements, $request);

        $elements = $this->filter($elements, $request);
        $elements = $this->custumFileters($elements, $request);

        $elements = $this->sort($elements, $request);
        $elements = $this->custumSort($elements, $request);

        $count = $elements->count();
        $elements = $this->pagenate($elements, $request);

        $sds = 'creator';
        $qu = $elements[0];
        //dd(json_encode($qu->$sds()->get()));
        $elements = new $this->collectionResource($elements);
        return $this->response($elements)->header('X-TOTAL-COUNT', $count);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $this->authorize('create',Auth::user() ,$this->model);
        dd('xc');
        $this->validateRequest($request, $this->storeRequest);

        $element = new $this->model($request->all());
        // $this->authorize('create', $element);
        if (auth()->user()->can('create', $element)) {
        }
        $this->setExtraFields($element);
        $element->save();

        foreach ($this->objects as $field => $relationType) {
            if ($request->input($field, false)) {

                $this->setObjectsRelations($request, $element, $relationType['clas'], $relationType['relationFunction'], $field);

            }
        }

        $element = new $this->itemResource($element);
        // dd(json_encode($element));
        return $this->response($element);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function show(Request $request, $id): JsonResponse
    {
        $this->authorize('viewAny', [Auth::user(), $this->model]);

        $element = $this->modelQuery()->findOrFail($id);
        $this->validateRequest($request, $this->showRequest);
        $element = new $this->itemResource($element);
        return $this->response($element);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $this->authorize('update', [Auth::user(), $this->model]);

        $element = $this->modelQuery()->findOrFail($id);
        $this->validateRequest($request, $this->updateRequest);

        $element->update($request->all());
        $this->setExtraFields($element);
        $element->save();

        $element = new $this->itemResource($element);
        return $this->response($element);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function destroy(Request $request, $id): JsonResponse
    {
        $this->authorize('delete', [Auth::user(), $this->model]);

        $element = $this->modelQuery()->findOrFail($id);
        $this->validateRequest($request, $this->destroyRequest);

        $deletedElement = $element;
        $element->delete();

        $deletedElement = new $this->itemResource($deletedElement);
        return $this->response($deletedElement);
    }

    public function modelQuery()
    {
        return ($this->model)::query();
    }

    public function search($query, $request)
    {
        $searchBy = ($this->model)::getSearchers();

        $len = count($searchBy);

        if ($len > 0 and $request->input('q', null) != null)
            return $query->where(
                function ($query) use ($request, $len, $searchBy) {
                    for ($i = 0; $i < $len; $i++)
                        $query->orWhere($searchBy[$i], 'LIKE', '%' . $request->input('q', null) . '%');
                });

        return $query;
    }

    public function filter($query, $request)
    {
        $filters = ($this->model)::getFilterable();
        foreach ($filters as $filter) {
            if ($request->input($filter, null) != null) {
                $query->where($filter, $request->input($filter, null));
            }
        }

        return $query;
    }

    public function sort($query, $request)
    {
        $order = $request->input('order', 'asc');
        $order = $order == 'desc' ? 'desc' : 'asc';
        $field = $request->input('field', null);

        if (Schema::hasColumn($this->table, $field)) {
            return $query->orderBy($field, $order);
        }

        return $query;
    }

    public function custumFileters($query, $request)
    {
        return $query;
    }

    public function custumSort($query, $request)
    {
        $field = $request->input('field', null);
        $order = $request->input('order', 'asc');
        $order = $order == 'desc' ? 'desc' : 'asc';

        if (!Schema::hasColumn($this->table, $field))
            return $order == 'desc' ? $query->get()->sortByDesc($field) : $query->get()->sortBy($field);
        return $query->get();
    }

    public function pagenate($collection, $request)
    {
        $skip = $request->input('skip', 0);
        $take = $request->input('take', 10);

        return $collection->skip($skip)
            ->take($take)->values();
    }

    public function setObjectsRelations($request, $element, $objectType, $relationFunction, $field)
    {

        $objects = $request->input($field);
        foreach ($objects as $object) {

            $object1 = new $objectType($object);
            ///  dd(json_encode($object1));

            $object1 = $this->setMinExtraFields($object1);
            $sds = $relationFunction;
            ///dd($relationFunction);
            //dd(json_encode($object1));
            $element->quizQuestions()->save($object1);

        }

    }


}
