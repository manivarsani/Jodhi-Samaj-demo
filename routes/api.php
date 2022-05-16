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


Route::resource('members', App\Http\Controllers\API\MemberAPIController::class);




Route::resource('families', App\Http\Controllers\API\familyAPIController::class);


Route::resource('socity_toals', App\Http\Controllers\API\SocityToalAPIController::class);


Route::resource('socitytoals', App\Http\Controllers\API\SocitytoalAPIController::class);






Route::resource('book_socities', App\Http\Controllers\API\BookSocityAPIController::class);




Route::resource('function_adds', App\Http\Controllers\API\functionAddAPIController::class);


Route::resource('annance_programs', App\Http\Controllers\API\AnnanceProgramAPIController::class);


Route::resource('meeting_scheduls', App\Http\Controllers\API\MeetingSchedulAPIController::class);


Route::resource('marraige_annonces', App\Http\Controllers\API\marraigeAnnonceAPIController::class);


Route::resource('marraige_announces', App\Http\Controllers\API\MarraigeAnnounceAPIController::class);


Route::resource('business_advotises', App\Http\Controllers\API\BusinessAdvotiseAPIController::class);


Route::resource('function_publishes', App\Http\Controllers\API\FunctionPublishAPIController::class);


Route::resource('dashbords', App\Http\Controllers\API\DashbordAPIController::class);
