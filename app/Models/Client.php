<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;

class Client extends Model
{
    use HasApiTokens, HasFactory;

    public function get_password_grant_client()
    {
        return DB::table('oauth_clients')->where('name', Env::get('APP_NAME').' Password Grant Client')->get();
    }
}
