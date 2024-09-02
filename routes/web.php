<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\MarkazOrphanCareController;
use App\Http\Controllers\EducationCenterAppController;
use App\Http\Controllers\SweetWaterProjectController;
use App\Http\Controllers\CulturalCenterAppController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/index',[AdminController::class,'index'])->name('index');

//Login routes
Route::get('/',[LoginController::class,'admin_login'])->name('login');
Route::post('/doAdminLogin',[LoginController::class,'do_admin_login'])->name('do.admin_login');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

//Admin routes
Route::prefix('admin')->middleware(['auth:admin', 'role:0'])->group(function ()
 {
Route::get('/dashboard',[AdminController::class,'admin_home'])->name('admin.home');
Route::get('/forgotPassword',[AdminController::class,'forgot_password'])->name('forgot_password');
Route::post('/submitForgetPasswordForm',[AdminController::class,'submitForgetPasswordForm'])->name('submitForgetPasswordForm');
Route::get('/sendMailReset',[AdminController::class,'send_mail_reset'])->name('send.mail_reset');
Route::get('/changePasswordForm/{token}',[AdminController::class,'change_password_form'])->name('change_password_form');
Route::post('/submitResetPasswordForm',[AdminController::class,'submitResetPasswordForm'])->name('submitResetPasswordForm');
Route::post('/doAddUser',[AdminController::class,'do_add_user'])->name('do.add_user');
Route::get('/dataTable',[AdminController::class,'data_table'])->name('data_table');
Route::post('/doAddDonor',[AdminController::class,'doAddDonor'])->name('do.AddDonor');


//user routes 

Route::get('/users/data', [UserController::class, 'getUserData'])->name('users.data');
Route::get('/home',[UserController::class,'home'])->name('user.home');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
//donor routes
Route::get('/donorView',[DonorController::class,'donorView'])->name('donor.view');
Route::get('/donors/data',[DonorController::class,'getDonorData'])->name('donor.data');
Route::get('/showdonors/{id}', [DonorController::class, 'show'])->name('donors.show');
Route::get('/donors/{id}/edit', [DonorController::class, 'edit'])->name('donors.edit');
Route::post('/donors/{id}', [DonorController::class, 'update'])->name('donors.update');
Route::delete('/donors/{id}', [DonorController::class, 'destroy'])->name('donors.destroy');


//Applications Route 
//markaz Open care routes 
Route::get('/markaz/orphan/care/view',[MarkazOrphanCareController::class,'getMarkazOrphanCare'])->name('admin.getMarkazOrphanCare');
Route::post('/markaz/orphan/care/new',[MarkazOrphanCareController::class,'doMarkazOrphanCare'])->name('admin.doMarkazOrphanCare');
Route::get('/markaz/orphan/care/datatable/view',[MarkazOrphanCareController::class,'getMarkazOrphanCareDataTable'])->name('admin.getMarkazOrphanCareDataTable');
Route::get('/markaz/orphan/care/view/more/{id}',[MarkazOrphanCareController::class,'getMarkazOpenCareViewMore'])->name('admin.getMarkazOpenCareViewMore');
Route::get('/markaz/orphan/care/edit/{id}',[MarkazOrphanCareController::class,'editMarkazOrphanCare'])->name('admin.editMarkazOrphanCare');
Route::post('/markaz/orphan/care/update',[MarkazOrphanCareController::class,'updateMarkazOrphanCare'])->name('admin.updateMarkazOrphanCare');
Route::delete('/markaz/orphan/care/delete/{id}',[MarkazOrphanCareController::class, 'deleteMarkazOrphanCare'])->name('admin.deleteMarkazOrphanCare');




Route::get('/education/center/application/view',[EducationCenterAppController::class,'getEducationCenterApplication'])->name('admin.getEducationCenterApplication');
Route::get('/sweetwater/project/view',[SweetWaterProjectController::class,'getSweetWaterProject'])->name('admin.getSweetWaterProject');
Route::get('/cultural/center/application/view',[CulturalCenterAppController::class,'getCulturalCenterApp'])->name('admin.getCulturalCenterApp');
});