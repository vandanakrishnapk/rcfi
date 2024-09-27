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
use App\Http\Controllers\userProjectController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectDetailsController;
use App\Http\Controllers\UserProjectDetailsController;
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
Route::prefix('admin')->middleware(['auth', 'role:1,2'])->group(function ()
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

//Education Centre Routes 
Route::get('/education/center/application/view',[EducationCenterAppController::class,'getEducationCenterApplication'])->name('admin.getEducationCenterApplication');
Route::post('/education/centre/application/new',[EducationCenterAppController::class,'doEducationCentreApplication'])->name('admin.doEducationCentreApplication');
Route::get('/education/centre/application/datatable',[EducationCenterAppController::class,'getEducationCentreDataTable'])->name('admin.getEducationCentreDataTable');
Route::get('/education/centre/application/view/more/{id}',[EducationCenterAppController::class,'getEducationCentreViewMore'])->name('admin.getEducationCentreViewMore');
Route::get('/education/centre/application/edit/{id}',[EducationCenterAppController::class,'editEducationCentreApplication'])->name('admin.editEducationCentreApplication');
Route::post('/education/centre/application/update',[EducationCenterAppController::class,'updateEducationCentreApplication'])->name('admin.updateEducationCentreApplication');
Route::delete('/education/centre/application/delete/{id}',[EducationCenterAppController::class, 'deleteEducationCentreApplication'])->name('admin.deleteEducationCentreApplication');

//Cultular Centre Application Routes
Route::get('/cultural/center/application/view',[CulturalCenterAppController::class,'getCulturalCenterApp'])->name('admin.getCulturalCenterApp');
Route::post('/cultural/centre/application/new',[CulturalCenterAppController::class,'doCulturalCentreApplication'])->name('admin.doCulturalCentreApplication');
Route::get('/cultural/centre/application/datatable',[CulturalCenterAppController::class,'getCulturalCentreDataTable'])->name('admin.getCulturalCentreDataTable');
Route::get('/cultural/centre/application/view/more/{id}',[CulturalCenterAppController::class,'getCulturalCentreViewMore'])->name('admin.getCulturalCentreViewMore');
Route::get('/cultural/centre/application/edit/{id}',[CulturalCenterAppController::class,'editCulturalCentreApplication'])->name('admin.editCulturalCentreApplication');
Route::post('/cultural/centre/application/update',[CulturalCenterAppController::class,'updateCulturalCentreApplication'])->name('admin.updateCulturalCentreApplication');
Route::delete('/cultural/centre/application/delete/{id}',[CulturalCenterAppController::class, 'deleteCulturalCentreApplication'])->name('admin.deleteCulturalCentreApplication');



//Sweet Water project Routes
Route::get('/sweetwater/project/view',[SweetWaterProjectController::class,'getSweetWaterProject'])->name('admin.getSweetWaterProject');
Route::post('/sweetwater/project/new',[SweetWaterProjectController::class,'doSweetWaterProject'])->name('admin.doSweetWaterProject');
Route::get('/sweetwater/project/datatable',[SweetWaterProjectController::class,'getSweetWaterProjectDataTable'])->name('admin.getSweetWaterProjectDataTable');
Route::get('/sweetwater/project/view/more/{id}',[SweetWaterProjectController::class,'getSweetWaterProjectViewMore'])->name('admin.getSweetWaterProjectViewMore');
Route::get('/sweetwater/project/edit/{id}',[SweetWaterProjectController::class,'editSweetWaterProject'])->name('admin.editSweetWaterProject');
Route::post('/sweetwater/project/update',[SweetWaterProjectController::class,'updateSweetWaterProject'])->name('admin.updateSweetWaterProject');
Route::delete('/sweetwater/project/delete/{id}',[SweetWaterProjectController::class, 'deleteSweetWaterProject'])->name('admin.deleteSweetWaterProject');


Route::get('/application/view',[AdminController::class,'getApplications'])->name('admin.getApplications'); 
Route::get('/projects/view',[ProjectController::class,'getProjects'])->name('admin.getProjects');
Route::post('/projects/new',[ProjectController::class,'doProject'])->name('admin.doProject');
Route::get('/projects/datatable',[ProjectController::class,'getProjectData'])->name('admin.getProjectData');
Route::get('/projects/view/more/{id}',[ProjectController::class,'projectViewMore'])->name('admin.projectViewMore');
Route::get('/projects/edit/{id}',[ProjectController::class,'editProject'])->name('admin.editProject');
Route::post('projects/update',[ProjectController::class,'updateProject'])->name('admin.updateProject');
Route::delete('projects/delete/{id}',[ProjectController::class, 'deleteProject'])->name('admin.deleteProject');

Route::get('/project/details/view/{id}',[ProjectDetailsController::class,'getProjectDetails'])->name('admin.getProjectDetails');
Route::post('/projects/details/do',[ProjectDetailsController::class,'doProjectDetails'])->name('admin.doProjectDetails');
Route::post('/projects/details/approval/{id}',[ProjectDetailsController::class,'projectApproval'])->name('admin.projectApproval');
});   



Route::prefix('user')->middleware(['auth', 'role:3'])->group(function ()
 {
    Route::get('/home',[UserController::class,'home'])->name('user.home');
    Route::get('/project/view',[userProjectController::class,'getUserProject'])->name('user.userProject');
    Route::get('/projects/datatable',[userProjectController::class,'getProjectData'])->name('user.getProjectData');

    Route::get('/project/details/view',[UserProjectDetailsController::class,'getProjectDetails'])->name('user.getProjectDetails');

    Route::get('/project/details/stage2/view/{id}',[UserProjectDetailsController::class,'getStage2'])->name('user.getStage2');

 });


