<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\Users\Collection\UsersResourceCollection;
use App\Http\Resources\Users\Item\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends ApiController
{
    public function __construct()
    {
        parent::__construct('users', UsersResourceCollection::class, UserResource::class, User::class);
    }

    public function getRequests(): array
    {
        $requests = [];
        $requests['index'] = IndexRequest::class;
        $requests['store'] = Request::class;
        $requests['update'] = Request::class;
        $requests['show'] = Request::class;
        $requests['destroy'] = Request::class;
        return $requests;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = User::query()->where('email', '=', $request->input('email'))->firstOrFail();
            Auth::guard('web')->login($user);

            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;

            $token->expires_at = Carbon::now()->addSeconds(60 * 60 * 24 * 7);
            $token->save();
            $user = new UserResource($user);
            // send token
            return response()->json([
                'user' => $user,
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
                'max_age' => 60 * 60 * 24 * 7,
            ]);
        }

        return $this->response401();
    }


    public function register(RegisterRequest $request)
    {
        $data = $request->only('email', 'first_name', 'last_name', 'position', 'address', 'rule_id');
        $data['password'] = Hash::make($request->input('password'));

        $user = new User($data);
        $user->save();

        Auth::guard('web')->login($user);
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        $token->expires_at = Carbon::now()->addSeconds(60 * 60 * 24 * 7);
        $token->save();

        return response()->json([
            'user' => $user,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            'max_age' => 60 * 60 * 24 * 7,
        ]);
    }


    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
        }


    }

    public function profile()
    {
        if (!Auth::check()) {
            return response()->json(null, 401);
        }

        $user = Auth::user();

        return response()->json($user);
    }

    public function store(Request $request): JsonResponse
    {
        return $this->response404();
    }


}
