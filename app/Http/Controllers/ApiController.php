<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;

class ApiController extends Controller
{
    public function paginate(Builder $results)
    {
        $total = $results->count();
        $skip = request('skip', 0);
        $take = request('take', 10);

        return response()->json([
            'page'    => ceil($skip / $take),
            'total'   => $total,
            'results' => $results->take($take)->skip($skip)->get(),
        ]);
    }

    public function response($data, $status = 200)
    {
        return response()->json($data, $status);
    }

    public function response401($message = 'Unauthorized')
    {
        return response()->json($message, 401);
    }

    public function response404($message = 'Not Found')
    {
        return response()->json($message, 404);
    }
}
