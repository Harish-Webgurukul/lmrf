<?php

use App\Http\Controllers\AncController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BiWeeklyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReportController;
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
Route::get('/add_operator', [OperatorController::class, 'index'])->name('add_operator')->middleware(['auth', 'can:admin']);
Route::post('/add_operator', [OperatorController::class, 'store'])->middleware(['auth', 'can:admin']);
Route::get('/viewall_operator', [OperatorController::class, 'viewall'])->name('viewall_operator')->middleware(['auth', 'can:admin']);
Route::get('/view_operator/{user}', [OperatorController::class, 'view'])->name('view_operator')->middleware(['auth', 'can:admin']);
Route::get('/view_operator/{user}/edit', [OperatorController::class, 'edit'])->name('edit_operator')->middleware(['auth', 'can:admin']);
Route::put('/view_operator/{user}', [OperatorController::class, 'update'])->name('update_operator')->middleware(['auth', 'can:admin']);
Route::delete('/delete_operator/{user}', [OperatorController::class, 'destroy'])->name('delete_operator')->middleware(['auth', 'can:admin']);
// operator route--end
// patient route--start
Route::get('/patients', [PatientController::class, 'index'])->name('patient.index')->middleware(['auth']);
Route::get('/patients/create', [PatientController::class, 'create'])->name('patient.create')->middleware(['auth']);
Route::post('/patients', [PatientController::class, 'store'])->name('patient.store')->middleware(['auth']);
Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patient.destroy')->middleware(['auth', 'can:admin']);
Route::get('/patient_edit/{id}', [PatientController::class, 'patient_edit'])->name('patient.edit')->middleware(['auth', 'can:admin']);
Route::post('/patient_update/{id}', [PatientController::class, 'patient_update'])->name('patient.update')->middleware(['auth', 'can:admin']);
Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patient.show')->middleware(['auth']);;
// patient route--ends
// patient_staff route
Route::get('/patient_staff_edit/{id}', [PatientController::class, 'patient_staff_edit'])->name('patient.patient_staff_edit')->middleware(['auth', 'can:staff']);
Route::post('/patient_staff_update/{id}', [PatientController::class, 'patient_staff_update'])->name('patient.patient_staff_update')->middleware(['auth', 'can:staff']);
// patient_staff route

// biweeklycall
Route::get('/new_call', [BiWeeklyController::class, 'new_call'])->name('new_call')->middleware(['auth']);
Route::get('/call_patient/{id}', [BiWeeklyController::class, 'call_patient'])->name('call_patient')->middleware(['auth']);
Route::post('/call_patient_update/{id}', [BiWeeklyController::class, 'call_patient_update'])->name('call_patient_update')->middleware(['auth']);
Route::get('/pending_call', [BiWeeklyController::class, 'pending_call'])->name('pending_call')->middleware(['auth']);
Route::get('/pending_call_patient/{id}', [BiWeeklyController::class, 'pending_call_patient'])->name('pending_call_patient')->middleware(['auth']);

// ils call starts
Route::get('/ilscalls', [BiWeeklyController::class, 'ils_index'])->name('ils.index')->middleware(['auth']);
Route::get('/ils_call_patient/{id}', [BiWeeklyController::class, 'ils_call_patient'])->name('ils.ils_call_patient')->middleware(['auth']);
Route::post('/ils_call_update/{id}', [BiWeeklyController::class, 'ils_call_update'])->name('ils.ils_call_update')->middleware(['auth']);
// ils call ends

// hospital visit
Route::get('/hospital_index', [BiWeeklyController::class, 'hospital_index'])->name('hospital.index')->middleware(['auth']);
Route::get('/hospital_call_patient/{id}', [BiWeeklyController::class, 'hospital_call_patient'])->name('hospital.call_patient')->middleware(['auth']);
Route::post('/hospital_call_update/{id}', [BiWeeklyController::class, 'hospital_call_update'])->name('hospital.call_update')->middleware(['auth']);

//homevisit
Route::get('/home_index_ils', [BiWeeklyController::class, 'home_index_ils'])->name('home.index_ils')->middleware(['auth']);
Route::get('/home_edit_ils/{id}', [BiWeeklyController::class, 'home_edit_ils'])->name('home.edit_ils')->middleware(['auth']);
Route::post('/home_update_ils/{id}', [BiWeeklyController::class, 'home_update_ils'])->name('home.update_ils')->middleware(['auth']);


Route::get('/home_index_nocontact', [BiWeeklyController::class, 'home_index_nocontact'])->name('home.index_nocontact')->middleware(['auth']);
Route::get('/home_edit_nocontact/{id}', [BiWeeklyController::class, 'home_edit_nocontact'])->name('home.edit_nocontact')->middleware(['auth']);
Route::post('/home_update_nocontact/{id}', [BiWeeklyController::class, 'home_update_nocontact'])->name('home.update_nocontact')->middleware(['auth']);

// facilities
Route::get('/facility/create', [FacilityController::class, 'create'])->name('facility.create')->middleware(['auth', 'can:admin']);
Route::post('/facility', [FacilityController::class, 'store'])->name('facility.store')->middleware(['auth', 'can:admin']);
Route::get('/facility/{facility}', [FacilityController::class, 'index'])->name('facility.index')->middleware(['auth', 'can:admin']);
Route::get('/facility', [FacilityController::class, 'view'])->name('facility.view')->middleware(['auth', 'can:admin']);
Route::delete('/facility/{facility}', [FacilityController::class, 'destroy'])->name('facility.destroy')->middleware(['auth', 'can:admin']);
Route::get('/facility/{facility}/edit', [FacilityController::class, 'edit'])->name('facility.edit')->middleware(['auth', 'can:admin']);
Route::put('/facility/{facility}', [FacilityController::class, 'update'])->name('facility.update')->middleware(['auth', 'can:admin']);

// ancvisit start
Route::get('/ancdelivery/{ancvisit}', [AncController::class, 'delivery_show'])->name('ancdelivery.show')->middleware(['auth']);
Route::post('/ancdelivery/{ancvisit}', [AncController::class, 'delivery_update'])->name('ancdelivery.update')->middleware(['auth']);
Route::get('/anc/{ancvisit}', [AncController::class, 'show'])->name('anc.show')->middleware(['auth']);
Route::post('/anc/{ancvisit}', [AncController::class, 'update'])->name('anc.update')->middleware(['auth']);

Route::get('/view2_all', [AncController::class, 'view2_all'])->name('anc2.view_all')->middleware(['auth']);
Route::get('/view3_all', [AncController::class, 'view3_all'])->name('anc3.view_all')->middleware(['auth']);
Route::get('/view4_all', [AncController::class, 'view4_all'])->name('anc4.view_all')->middleware(['auth']);
Route::get('/view5_all', [AncController::class, 'view5_all'])->name('anc5.view_all')->middleware(['auth']);
Route::get('/view6_all', [AncController::class, 'view6_all'])->name('anc6.view_all')->middleware(['auth']);
//anc visit ends


// report
Route::get('/reports', [ReportController::class, 'index'])->name('reports')->middleware(['auth', 'can:admin']);
Route::post('/reports', [ReportController::class, 'staff_report'])->name('staff_report')->middleware(['auth', 'can:admin']);
Route::get('/reportdownload', [ReportController::class, 'exportdata'])->name('exportdata');
// report ends

// Route::get('/', function () {
//     return view('welcome');
// });
