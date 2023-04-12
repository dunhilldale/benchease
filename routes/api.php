<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->prefix('v1')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // Route::resource('accounts', 'AccountController');
    // Route::resource('monthly-items', 'MonthlyItemController');
    // Route::resource('daily-items', 'DailyItemController');
    // Route::resource('daily-cost', 'DailyCostController');
    // Route::resource('category', 'CategoryController');
    // Route::resource('location', 'LocationController');
    // Route::resource('group', 'GroupController');
    // Route::resource('metrics', 'MetricsController');
    // Route::resource('dashboardNote', 'DashboardNoteController');
    // Route::resource('jobopenings', 'JobOpeningsController');
});
