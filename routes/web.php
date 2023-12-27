<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BiWeeklyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

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


Route::get('', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('loginauth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

// operator route

Route::get('/add_operator', [OperatorController::class, 'index'])->name('add_operator');
Route::post('/add_operator', [OperatorController::class, 'store']);
Route::get('/edit_operator', [OperatorController::class, 'edit'])->name('edit_operator');
Route::post('/update_operator', [OperatorController::class, 'update'])->name('update_operator');
Route::get('/viewall_operator', [OperatorController::class, 'viewall'])->name('viewall_operator');
Route::get('/view_operator', [OperatorController::class, 'view'])->name('view_operator');


// operator route

Route::get('/add_patient', [PatientController::class, 'index'])->name('add_patient');
Route::post('/add_patient', [PatientController::class, 'store']);
Route::get('/viewall_patients', [PatientController::class, 'viewall'])->name('viewall_patients');
Route::get('/viewone_patient', [PatientController::class, 'viewone'])->name('viewone_patient');

// biweeklycall
Route::get('/new_call', [BiWeeklyController::class, 'new_call'])->name('new_call');
Route::post('/call_patient', [BiWeeklyController::class, 'call_patient'])->name('call_patient');


// Route::get('/', function () {
//     return view('welcome');
// });
