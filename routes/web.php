<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('aspirant_registrations',[MainController::class,'index']);
Route::get('training',[MainController::class,'index']);
Route::post('save_aspirant',[MainController::class,'store']);
Route::get('view_aspirants_per_county',[MainController::class,'viewAspirants']);
Route::get('view_aspirants_per_class',[MainController::class,'viewAspirantsPerClass']);


Route::get('member_registration',[MainController::class,'memberRegistration']);
Route::post('save_member',[MainController::class,'saveMember']);

Route::get('fetch_member/{id}',[MainController::class,'fetchMember']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
