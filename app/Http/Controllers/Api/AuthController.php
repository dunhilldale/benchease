<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Client;

class AuthController extends Controller
{

    public function __construct(
        protected object $client = new Client()
    )
    {
    }

    protected function authenticate(Request $request) : mixed
    {
        $client = $this->client->get_password_grant_client()->first();

        $request->request->add([
            'grant_type' => $request->grant_type ?? 'password',
            'username' => $request->email,
            'password' => $request->password,
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'scope' => $request->grant_type ?? null,
        ]);

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        return Route::dispatch($proxy);
    }

    protected function refreshToken(Request $request) : mixed
    {
        $request->request->add([
            'grant_type' => $request->grant_type ?? 'refresh_token',
            'refresh_token' => $request->refresh_token,
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'scope' => ''
        ]);

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        return Route::dispatch($proxy);
    }
}