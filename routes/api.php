<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('fetch_mobilizer/{polling_center}/{id}',[\App\Http\Controllers\AgentsController::class,'fetchMobilizer']);
Route::get('check_mobilizer/{polling_center}/{id}',[\App\Http\Controllers\AgentsController::class,'checkMobilizer']);
Route::get('search_mobilizer/{id}/{polling_station}',[\App\Http\Controllers\AgentsController::class,'searchMobilizer']);
Route::get('check_phone_number/{phone_number}',[\App\Http\Controllers\AgentsController::class,'checkPhoneNumber']);

