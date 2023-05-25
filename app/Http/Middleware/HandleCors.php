<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Middleware\HandleCors as BaseCors;

class HandleCors extends BaseCors
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        // dd('Interrupted!');
        return $next($request)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', '*')
        ->header('Access-Control-Allow-Credentials', true)
        ->header('Access-Control-Max-Age', 86400)
        ->header('Access-Control-Allow-Headers', '*');
        // ->header('Access-Control-Allow-Headers', 'X-Requested-With,Content-Type,X-Token-Auth,Authorization');

    }
}
