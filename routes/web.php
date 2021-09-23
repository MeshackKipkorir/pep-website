<?php

use App\Http\Controllers\CallCenterController;
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
Route::get('mobilizers_report',[App\Http\Controllers\AgentsController::class,'mobilizersReport']);
Route::get('mobilizers_final_report',[App\Http\Controllers\AgentsController::class,'mobilizersFinalReport']);

Route::get('super_mobilizers_registration',[App\Http\Controllers\AgentsController::class,'superMobilizers']);

//save mobilizer
Route::post('save_mobilizer',[\App\Http\Controllers\AgentsController::class,'saveMobilizer']);
Route::post('save_super_mobilizer',[\App\Http\Controllers\AgentsController::class,'saveSuperMobilizer']);
/**
 * Admin routes
 */


Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/registered_members', [App\Http\Controllers\AdminController::class, 'viewRegisteredMembers']);
});

//materials manager
Route::get('materials_manager',[App\Http\Controllers\AgentsController::class,'materialsManager']);
Route::get('mobilizers_without_phone',[App\Http\Controllers\AgentsController::class,'materialsManagerNoPhone']);
Route::get('materials_report',[App\Http\Controllers\AgentsController::class,'materialsReport']);
Route::post('save_materials',[App\Http\Controllers\AgentsController::class,'saveMaterials']);
Route::post('save_materials_no_phone',[App\Http\Controllers\AgentsController::class,'saveMaterialsManagerNoPhone']);
Route::get('recruited_without_phone',[App\Http\Controllers\AgentsController::class,'recruitedWithoutPhone']);
Route::get('not_recruited_with_phone',[App\Http\Controllers\AgentsController::class,'notRecruitedWithPhone']);
Route::get('not_recruited_without_phone',[App\Http\Controllers\AgentsController::class,'notRecruitedWithoutPhone']);
Route::get('token_one',[App\Http\Controllers\AgentsController::class,'token']);
Route::get('token_one_report',[App\Http\Controllers\AgentsController::class,'tokenOneReport'])->middleware('auth');
Route::post('save_token',[App\Http\Controllers\AgentsController::class,'saveToken']);


/**
 * Call Center
 */

Route::get('call_center',[CallCenterController::class,'index'])->middleware('auth');
Route::post('save_opinion',[CallCenterController::class,'saveOpinion'])->middleware('auth');
Route::get('call_center_report',[CallCenterController::class,'callCenterReport']);
