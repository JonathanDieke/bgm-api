<?php

use App\Http\Controllers\DailyDataController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/login", [UserController::class, 'login']);
Route::post("/register", [UserController::class, 'register']);

// Route::$dataname('meal.')->prefix('meal')->group(function () {
//    Route::post('/', 'store')->name('create');
// });
Route::apiResource('meal', MealController::class);
Route::apiResource('daily-data', DailyDataController::class);
