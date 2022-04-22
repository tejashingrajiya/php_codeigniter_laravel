<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PatientController;

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
	
//Doctor
Route::resource('doctor', DoctorController::class);
//Route::resource('doctor', [DoctorController::class, "index"])->name('doctor');

//Nurse
Route::resource('nurse', NurseController::class);
//Route::post('nurse/store', [NurseController::class, "store"]);

//Patient
Route::resource('patient', PatientController::class);
Route::post('nurse/update', [PatientController::class, "update"]);



Auth::routes();

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('role');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
