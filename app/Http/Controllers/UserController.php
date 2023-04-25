<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\UsersResource;
use App\Http\Requests\StoreUsersRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

use App\Exceptions\ClientException;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['store']]);
    }

    public function index()
    {
        parent::check_user_access();

        return response(
        [
            'result' => UsersResource::collection(User::all()), 
            'message' => 'Successful'
        ], 200);
    }

    public function store(StoreUsersRequest $request)
    {
        $request->merge(array('created_by' => 1));
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        $token = Request::create(
            'api/v1/auth/token',
            'POST',
            [
                'grant_type'    => 'password',
                'username'      => $user->email,
                'password'      => $user->password,
                // 'scope'         => 'get_user_info',
            ]
        );

        return Route::dispatch($token);
        
    }

    public function show(User $user)
    {
        parent::check_user_access($user);

        return response(
        [
            'result' => new UsersResource($user), 
            'message' => 'Successful'
        ], 200);
        // return new UsersResource($user);
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
