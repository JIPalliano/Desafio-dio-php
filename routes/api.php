<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimesController;

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

Route::get('/times', [TimesController::class, 'getAll']);
Route::post('/times/store',[TimesController::class, 'store']);
Route::get('/times/time/{time}',[TimesController::class, 'getTimesByCity']);
Route::get('/times/{id}',[TimesController::class, 'getById']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
