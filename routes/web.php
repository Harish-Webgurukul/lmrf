<?php

use App\Http\Controllers\AncController;
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

Route::get('/patients/{photo}', [PatientController::class, 'show'])->name('patient.show');
// patient route--ends
// biweeklycall
Route::get('/new_call', [BiWeeklyController::class, 'new_call'])->name('new_call');
Route::get('/call_patient/{id}', [BiWeeklyController::class, 'call_patient'])->name('call_patient');
Route::post('/call_patient_update/{id}', [BiWeeklyController::class, 'call_patient_update'])->name('call_patient_update');
Route::get('/pending_call', [BiWeeklyController::class, 'pending_call'])->name('pending_call');
Route::get('/pending_call_patient/{id}', [BiWeeklyController::class, 'pending_call_patient'])->name('pending_call_patient');

// ils call starts
Route::get('/ilscalls', [BiWeeklyController::class, 'ils_index'])->name('ils.index');
Route::get('/ils_call_patient/{id}', [BiWeeklyController::class, 'ils_call_patient'])->name('ils.ils_call_patient');
Route::post('/ils_call_update/{id}', [BiWeeklyController::class, 'ils_call_update'])->name('ils.ils_call_update');
// ils call ends

// hospital visit
Route::get('/hospital_index', [BiWeeklyController::class, 'hospital_index'])->name('hospital.index');
Route::get('/hospital_call_patient/{id}', [BiWeeklyController::class, 'hospital_call_patient'])->name('hospital.call_patient');
Route::post('/hospital_call_update/{id}', [BiWeeklyController::class, 'hospital_call_update'])->name('hospital.call_update');

//homevisit
Route::get('/home_index_ils', [BiWeeklyController::class, 'home_index_ils'])->name('home.index_ils');
Route::get('/home_index_nocontact', [BiWeeklyController::class, 'home_index_nocontact'])->name('home.index_nocontact');

// facilities
Route::get('/facility/create', [FacilityController::class, 'create'])->name('facility.create');
Route::post('/facility', [FacilityController::class, 'store'])->name('facility.store');
Route::get('/facility/{facility}', [FacilityController::class, 'index'])->name('facility.index');
Route::get('/facility', [FacilityController::class, 'view'])->name('facility.view');
Route::delete('/facility/{facility}', [FacilityController::class, 'destroy'])->name('facility.destroy');
Route::get('/facility/{facility}/edit', [FacilityController::class, 'edit'])->name('facility.edit');
Route::put('/facility/{facility}', [FacilityController::class, 'update'])->name('facility.update');





// ancvisit start
Route::get('/anc/{ancvisit}', [AncController::class, 'show'])->name('anc.show');
Route::post('/anc/{ancvisit}', [AncController::class, 'update'])->name('anc.update');

Route::get('/view2_all', [AncController::class, 'view2_all'])->name('anc2.view_all');
Route::get('/view3_all', [AncController::class, 'view3_all'])->name('anc3.view_all');
Route::get('/view4_all', [AncController::class, 'view4_all'])->name('anc4.view_all');
Route::get('/view5_all', [AncController::class, 'view5_all'])->name('anc5.view_all');
Route::get('/view6_all', [AncController::class, 'view6_all'])->name('anc6.view_all');
//anc visit ends

// Route::get('/', function () {
//     return view('welcome');
// });
