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
    return redirect('call_center');
});

// Route::get('aspirant_registrations',[MainController::class,'index']);
// Route::get('training',[MainController::class,'index']);
// Route::post('save_aspirant',[MainController::class,'store']);
// Route::get('view_aspirants_per_county',[MainController::class,'viewAspirants']);
// Route::get('view_aspirants_per_class',[MainController::class,'viewAspirantsPerClass']);
// Route::get('diaspora',[MainController::class,'diasporaRegistration']);
// Route::get('view_registered_diaspora',[MainController::class,'viewDiaspora']);
// Route::post('save_diaspora',[MainController::class,'storeDiaspora']);

// //save contact feeback
// Route::post('save_feedback',[MainController::class,'saveFeedback']);



// Route::get('member_registration',[MainController::class,'memberRegistration']);
// Route::post('save_member',[MainController::class,'saveMember']);

// Route::get('fetch_member/{id}',[MainController::class,'fetchMember']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// /**
//  * Agents / mobilizers
//  */

// Route::get('agent_a_mobilizer_registration',[App\Http\Controllers\AgentsController::class,'addMobilizer'])->middleware('auth');
// Route::get('agent_b_mobilizer_registration',[App\Http\Controllers\AgentsController::class,'addMobilizerB'])->middleware('auth');

// Route::get('agents_report',[App\Http\Controllers\AgentsController::class,'agentsReport']);
// Route::get('mobilizers_report',[App\Http\Controllers\AgentsController::class,'mobilizersReport']);
// Route::get('mobilizers_final_report',[App\Http\Controllers\AgentsController::class,'mobilizersFinalReport']);

// Route::get('super_mobilizers_registration',[App\Http\Controllers\AgentsController::class,'superMobilizers']);

// //save mobilizer
// Route::post('save_mobilizer',[\App\Http\Controllers\AgentsController::class,'saveMobilizer']);
// Route::post('save_super_mobilizer',[\App\Http\Controllers\AgentsController::class,'saveSuperMobilizer']);
// /**
//  * Admin routes
//  */


// Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
//     Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
//     Route::get('/registered_members', [App\Http\Controllers\AdminController::class, 'viewRegisteredMembers']);
// });

// //materials manager
// Route::get('materials_manager',[App\Http\Controllers\AgentsController::class,'materialsManager']);
// Route::get('mobilizers_without_phone',[App\Http\Controllers\AgentsController::class,'materialsManagerNoPhone']);
// Route::get('materials_report',[App\Http\Controllers\AgentsController::class,'materialsReport']);
// Route::post('save_materials',[App\Http\Controllers\AgentsController::class,'saveMaterials']);
// Route::post('save_materials_no_phone',[App\Http\Controllers\AgentsController::class,'saveMaterialsManagerNoPhone']);
// Route::get('recruited_without_phone',[App\Http\Controllers\AgentsController::class,'recruitedWithoutPhone']);
// Route::get('not_recruited_with_phone',[App\Http\Controllers\AgentsController::class,'notRecruitedWithPhone']);
// Route::get('not_recruited_without_phone',[App\Http\Controllers\AgentsController::class,'notRecruitedWithoutPhone']);
// Route::get('token_one',[App\Http\Controllers\AgentsController::class,'token']);
// Route::get('token_one_report',[App\Http\Controllers\AgentsController::class,'tokenOneReport'])->middleware('auth');
// Route::post('save_token',[App\Http\Controllers\AgentsController::class,'saveToken']);


// /**
//  * Kiagu call center routes
//  */

// Route::get('call_center',[CallCenterController::class,'index'])->middleware('auth');
 Route::post('save_opinion',[CallCenterController::class,'saveOpinionTwo'])->middleware('auth');
// Route::get('call_center_report',[CallCenterController::class,'callCenterReport']);
// Route::get('call_center_second_report',[CallCenterController::class,'callCenterReportTwo']);
// Route::get('poll_three',[CallCenterController::class,'callCenterReportThree']);
// Route::get('poll_four_results',[CallCenterController::class,'callCenterReportFour']);
// Route::get('poll_five_results',[CallCenterController::class,'callCenterReportFive']);
// Route::get('kiagu_seventh_poll_results',[CallCenterController::class,'kiaguSeventhPollReport']);

// /**
//  * Mahoo call center routes
//  */
// Route::get('mahoo_first_poll',[CallCenterController::class,'mahooResults']);

// /**
//  * Voters statistics
//  */

// Route::get('voters_target',[MainController::class,'target'])->middleware('auth');

// Route::get('members_registered_via_ussd',[MainController::class,'fetchUssdmembers']);
// Route::get('registered_aspirants',[MainController::class,'fetchUssdAspirants']);

/**
 * UDA Call center
 */

Route::get('call_center_poll_report',[CallCenterController::class,'kiaguSeventhPollReport'])->middleware('auth');
Route::get('february_poll_report',[CallCenterController::class,'febPollResults'])->middleware('auth');
Route::get('march_poll_report',[CallCenterController::class,'marchPollResults'])->middleware('auth');
Route::get('call_center',[CallCenterController::class,'index'])->middleware('auth');
Route::get('pledges',[CallCenterController::class,'pledges'])->middleware('auth');
Route::get('add-registered_voters',[CallCenterController::class,'addRegisteredVoters'])->middleware('auth');
Route::post('save-registered-voters',[CallCenterController::class,'saveRegisteredVoters'])->middleware('auth');
Route::post('save-pledge',[CallCenterController::class,'savePledge'])->middleware('auth');
Route::get('ussd_poll_report',[\App\Http\Controllers\PollsApi::class,'mainResults'])->middleware('auth');
Route::get('allocate_agents',[\App\Http\Controllers\CallCenterController::class,'allocateAgents'])->middleware('auth');
Route::post('allocate-ward',[CallCenterController::class,'saveAllocation'])->middleware('auth');
Route::get('pledge_report',[CallCenterController::class,'pledgeReport'])->middleware('auth');
Route::get('july_poll_report',[CallCenterController::class,'julyPollReport'])->middleware('auth');
