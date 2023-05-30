<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Client;

class AuthController extends Controller
{

    protected function authenticate(Request $request): mixed
    {

        $client = Client::get_password_grant_client()->first();
        $params = [
            'grant_type' => $request->grant_type ?? 'password',
            'username' => $request->username,
            'password' => $request->password,
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'scope' => $request->scope ?? null,
        ];

        $proxy = Request::create(
            uri: 'oauth/token',
            method: 'POST',
            parameters: $params
        );

        return Route::dispatch($proxy);
    }

    protected function refreshToken(Request $request): mixed
    {
        $client = Client::get_password_grant_client()->first();
        // $request->request->add([
        //     'grant_type' => $request->grant_type ?? 'refresh_token',
        //     'refresh_token' => $request->refresh_token,
        //     'client_id' => $client->id,
        //     'client_secret' => $client->secret,
        //     'scope' => ''
        // ]);

        $params = [
            'grant_type' => $request->grant_type ?? 'refresh_token',
            'refresh_token' => $request->refresh_token,
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'scope' => ''
        ];

        $proxy = Request::create(
            uri: 'oauth/token/refresh',
            method: 'POST',
            parameters: $params
        );

        return Route::dispatch($proxy);
    }
}
