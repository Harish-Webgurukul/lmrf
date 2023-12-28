<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BiWeeklyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilityController;
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

// operator route--start
Route::get('/add_operator', [OperatorController::class, 'index'])->name('add_operator');
Route::post('/add_operator', [OperatorController::class, 'store']);
Route::get('/viewall_operator', [OperatorController::class, 'viewall'])->name('viewall_operator');
Route::get('/view_operator/{user}', [OperatorController::class, 'view'])->name('view_operator');
Route::get('/view_operator/{user}/edit', [OperatorController::class, 'edit'])->name('edit_operator');
Route::put('/view_operator/{user}', [OperatorController::class, 'update'])->name('update_operator');
Route::delete('/delete_operator/{user}', [OperatorController::class, 'destroy'])->name('delete_operator');
// operator route--end
// patient route--start
Route::get('/patients', [PatientController::class, 'index'])->name('patient.index');
Route::get('/patients/create', [PatientController::class, 'create'])->name('patient.create');
Route::post('/patients', [PatientController::class, 'store'])->name('patient.store');
Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patient.destroy');

// Route::get('/viewall_patients', [PatientController::class, 'viewall'])->name('viewall_patients');
Route::get('/patients/{photo}', [PatientController::class, 'show'])->name('patient.show');
// patient route--end
// biweeklycall
Route::get('/new_call', [BiWeeklyController::class, 'new_call'])->name('new_call');
Route::get('/call_patient/{id}', [BiWeeklyController::class, 'call_patient'])->name('call_patient');
Route::post('/call_patient_update/{id}', [BiWeeklyController::class, 'call_patient_update'])->name('call_patient_update');
Route::get('/pending_call', [BiWeeklyController::class, 'pending_call'])->name('pending_call');
Route::get('/pending_call_patient/{id}', [BiWeeklyController::class, 'pending_call_patient'])->name('pending_call_patient');

// facilities
Route::get('/facility/create', [FacilityController::class, 'create'])->name('facility.create');
Route::post('/facility', [FacilityController::class, 'store'])->name('facility.store');
// Route::get('/', function () {
//     return view('welcome');
// });
