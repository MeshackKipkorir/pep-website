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

Auth::routes();


Route::get('/', function () {
    return view('index');
});

Route::get('aspirant_registrations',[MainController::class,'index']);
Route::get('training',[MainController::class,'index']);
Route::post('save_aspirant',[MainController::class,'store']);
Route::get('view_aspirants_per_county',[MainController::class,'viewAspirants']);
Route::get('view_aspirants_per_class',[MainController::class,'viewAspirantsPerClass']);
Route::get('diaspora',[MainController::class,'diasporaRegistration']);
Route::get('view_registered_diaspora',[MainController::class,'viewDiaspora']);
Route::post('save_diaspora',[MainController::class,'storeDiaspora']);

//save contact feeback
Route::post('save_feedback',[MainController::class,'saveFeedback']);



Route::get('member_registration',[MainController::class,'memberRegistration']);
Route::post('save_member',[MainController::class,'saveMember']);

Route::get('fetch_member/{id}',[MainController::class,'fetchMember']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Agents / mobilizers
 */

Route::get('agent_a_mobilizer_registration',[App\Http\Controllers\AgentsController::class,'addMobilizer'])->middleware('auth');
Route::get('agent_b_mobilizer_registration',[App\Http\Controllers\AgentsController::class,'addMobilizerB'])->middleware('auth');

Route::get('agents_report',[App\Http\Controllers\AgentsController::class,'agentsReport']);
//save mobilizer
Route::post('save_mobilizer',[\App\Http\Controllers\AgentsController::class,'saveMobilizer']);
/**
 * Admin routes
 */


Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/registered_members', [App\Http\Controllers\AdminController::class, 'viewRegisteredMembers']);
});
