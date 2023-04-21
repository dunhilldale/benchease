<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('test')->group(function(){
    Route::get('/test1', function(Request $request){
        return 'You have reach this API endpoint';
    });
});

Route::prefix('v1')->group(function(){
    Route::post('auth/token', [AuthController::class, 'authenticate']);
    Route::post('auth/refresh', [AuthController::class, 'refreshToken']);
    // Route::post('users/register', [UserController::class, 'create']); //->name('user.create')
    Route::resource('users', UserController::class);
});

// Route::middleware('auth:api')->prefix('v2')->group(function(){});
