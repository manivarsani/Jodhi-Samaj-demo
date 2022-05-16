<?php

use App\Http\Controllers\FrameworkController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;

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
    return view('welcome');
});
Auth::routes();

Route::redirect('/', 'login');
Auth::routes(['register' => false]);


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('members', App\Http\Controllers\MemberController::class);
Route::resource('families', App\Http\Controllers\familyController::class);
Route::resource('socityToals', App\Http\Controllers\SocityToalController::class);
Route::resource('socitytoals', App\Http\Controllers\SocitytoalController::class);
Route::resource('bookSocities', App\Http\Controllers\BookSocityController::class);
Route::resource('functionAdds', App\Http\Controllers\functionAddController::class);
Route::resource('annancePrograms', App\Http\Controllers\AnnanceProgramController::class);
Route::resource('meetingScheduls', App\Http\Controllers\MeetingSchedulController::class);
Route::resource('marraigeAnnonces', App\Http\Controllers\marraigeAnnonceController::class);
Route::resource('marraigeAnnounces', App\Http\Controllers\MarraigeAnnounceController::class);
Route::resource('businessAdvotises', App\Http\Controllers\BusinessAdvotiseController::class);
Route::resource('functionPublishes', App\Http\Controllers\FunctionPublishController::class);
Route::resource('businessAdvotises', App\Http\Controllers\businessAdvotiseController::class);


Route::resource('dashbords', App\Http\Controllers\DashbordController::class);
