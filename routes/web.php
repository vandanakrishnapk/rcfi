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
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\userMarkazOrphanCareController;
use App\Http\Controllers\userEducationCentreController;
use App\Http\Controllers\userSweetWaterProjectController;
use App\Http\Controllers\userCulturalCentreController;
use App\Http\Controllers\userApplicationController;
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
Route::get('/dashboard',[AdminController::class,'admin_home'])->name('admin.home');
Route::get('/forgotPassword',[AdminController::class,'forgot_password'])->name('forgot_password');
Route::post('/submitForgetPasswordForm',[AdminController::class,'submitForgetPasswordForm'])->name('submitForgetPasswordForm');
Route::get('/sendMailReset',[AdminController::class,'send_mail_reset'])->name('send.mail_reset');
Route::get('/changePasswordForm/{token}',[AdminController::class,'change_password_form'])->name('change_password_form');
Route::post('/submitResetPasswordForm',[AdminController::class,'submitResetPasswordForm'])->name('submitResetPasswordForm');

Route::post('/logout',[LoginController::class,'logout'])->name('logout');

//Admin routes
Route::prefix('admin')->middleware(['auth', 'role:1,2'])->group(function ()
 {
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

//Cultural Centre Application Routes
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
Route::post('/project/details/applicant/approve/{id}',[ProjectDetailsController::class,'applicantApprove'])->name('admin.applicantApprove');

Route::get('/download-document',[ProjectDetailsController::class,'download'])->name('admin.download'); 
Route::post('/project/details/files/approve/{proId}',[ProjectDetailsController::class,'fileApproval'])->name('admin.fileApproval');
Route::get('/project/details/stage4/fund/view',[ProjectDetailsController::class,'fundAllocatedView'])->name('admin.fundAllocatedView');
Route::post('/project/details/stage4/fund/approve/{id}',[ProjectDetailsController::class,'fundApproval'])->name('admin.fundApproval'); 
Route::get('/project/details/stage5/implementation/datatable',[ProjectDetailsController::class,'viewImplementation'])->name('admin.viewImplementation');
Route::post('/project/details/stage5/bill/approve/{id}',[ProjectDetailsController::class,'billApprove'])->name('admin.billApprove');
Route::post('/project/details/stage6/completion/approve/{id}',[ProjectDetailsController::class,'approveCompletion'])->name('admin.approveCompletion');
Route::get('/download/completion/file',[ProjectDetailsController::class,'downloadFile'])->name('admin.downloadFile');
});   



Route::prefix('user')->middleware(['auth', 'role:3,4'])->group(function ()
 {
    Route::get('/home',[UserController::class,'home'])->name('user.home');
    Route::get('/project/view',[userProjectController::class,'getUserProject'])->name('user.userProject');
    Route::get('/projects/datatable',[userProjectController::class,'getProjectData'])->name('user.getProjectData');

    Route::get('/project/details/view/{id}',[UserProjectDetailsController::class,'getProjectDetails'])->name('user.getProjectDetails');

    //Applications Route 
//markaz Open care routes 
Route::get('/markaz/orphan/care/view',[userMarkazOrphanCareController::class,'getMarkazOrphanCare'])->name('user.getMarkazOrphanCare');
Route::post('/markaz/orphan/care/new',[userMarkazOrphanCareController::class,'doMarkazOrphanCare'])->name('user.doMarkazOrphanCare');
Route::get('/markaz/orphan/care/datatable/view',[userMarkazOrphanCareController::class,'getMarkazOrphanCareDataTable'])->name('user.getMarkazOrphanCareDataTable');
Route::get('/markaz/orphan/care/view/more/{id}',[userMarkazOrphanCareController::class,'getMarkazOpenCareViewMore'])->name('user.getMarkazOpenCareViewMore');
Route::get('/markaz/orphan/care/edit/{id}',[userMarkazOrphanCareController::class,'editMarkazOrphanCare'])->name('user.editMarkazOrphanCare');
Route::post('/markaz/orphan/care/update',[userMarkazOrphanCareController::class,'updateMarkazOrphanCare'])->name('user.updateMarkazOrphanCare');
Route::delete('/markaz/orphan/care/delete/{id}',[userMarkazOrphanCareController::class, 'deleteMarkazOrphanCare'])->name('user.deleteMarkazOrphanCare');

//Education Centre Routes 
Route::get('/education/center/application/view',[userEducationCentreController::class,'getEducationCenterApplication'])->name('user.getEducationCenterApplication');
Route::post('/education/centre/application/new',[userEducationCentreController::class,'doEducationCentreApplication'])->name('user.doEducationCentreApplication');
Route::get('/education/centre/application/datatable',[userEducationCentreController::class,'getEducationCentreDataTable'])->name('user.getEducationCentreDataTable');
Route::get('/education/centre/application/view/more/{id}',[userEducationCentreController::class,'getEducationCentreViewMore'])->name('user.getEducationCentreViewMore');
Route::get('/education/centre/application/edit/{id}',[userEducationCentreController::class,'editEducationCentreApplication'])->name('user.editEducationCentreApplication');
Route::post('/education/centre/application/update',[userEducationCentreController::class,'updateEducationCentreApplication'])->name('user.updateEducationCentreApplication');
Route::delete('/education/centre/application/delete/{id}',[userEducationCentreController::class, 'deleteEducationCentreApplication'])->name('user.deleteEducationCentreApplication');

//Cultular Centre Application Routes
Route::get('/cultural/center/application/view',[userCulturalCentreController::class,'getCulturalCenterApp'])->name('user.getCulturalCenterApp');
Route::post('/cultural/centre/application/new',[userCulturalCentreController::class,'doCulturalCentreApplication'])->name('user.doCulturalCentreApplication');
Route::get('/cultural/centre/application/datatable',[userCulturalCentreController::class,'getCulturalCentreDataTable'])->name('user.getCulturalCentreDataTable');
Route::get('/cultural/centre/application/view/more/{id}',[userCulturalCentreController::class,'getCulturalCentreViewMore'])->name('user.getCulturalCentreViewMore');
Route::get('/cultural/centre/application/edit/{id}',[userCulturalCentreController::class,'editCulturalCentreApplication'])->name('user.editCulturalCentreApplication');
Route::post('/cultural/centre/application/update',[userCulturalCentreController::class,'updateCulturalCentreApplication'])->name('user.updateCulturalCentreApplication');
Route::delete('/cultural/centre/application/delete/{id}',[userCulturalCentreController::class, 'deleteCulturalCentreApplication'])->name('user.deleteCulturalCentreApplication');



//Sweet Water project Routes
Route::get('/sweetwater/project/view',[userSweetWaterProjectController::class,'getSweetWaterProject'])->name('user.getSweetWaterProject');
Route::post('/sweetwater/project/new',[userSweetWaterProjectController::class,'doSweetWaterProject'])->name('user.doSweetWaterProject');
Route::get('/sweetwater/project/datatable',[userSweetWaterProjectController::class,'getSweetWaterProjectDataTable'])->name('user.getSweetWaterProjectDataTable');
Route::get('/sweetwater/project/view/more/{id}',[userSweetWaterProjectController::class,'getSweetWaterProjectViewMore'])->name('user.getSweetWaterProjectViewMore');
Route::get('/sweetwater/project/edit/{id}',[userSweetWaterProjectController::class,'editSweetWaterProject'])->name('user.editSweetWaterProject');
Route::post('/sweetwater/project/update',[userSweetWaterProjectController::class,'updateSweetWaterProject'])->name('user.updateSweetWaterProject');
Route::delete('/sweetwater/project/delete/{id}',[userSweetWaterProjectController::class, 'deleteSweetWaterProject'])->name('user.deleteSweetWaterProject');


Route::get('/application/view',[userApplicationController::class,'getApplications'])->name('user.getApplications');  
Route::post('/project/details/submit/applicant/new',[UserProjectDetailsController::class,'submitApplicant'])->name('user.submitApplicant');
Route::post('/project/details/submit/documents',[UserProjectDetailsController::class,'submitDocuments'])->name('user.submitDocuments'); 

Route::post('/documents/{id}/{type}', [UserProjectDetailsController::class, 'deleteDocument']);
Route::get('/download-document', [UserProjectDetailsController::class, 'download'])->name('document.download');

Route::post('/project/details/stage4/input/new',[UserProjectDetailsController::class,'doStage4Input'])->name('user.doStage4Input');
Route::post('/project/details/stage4/fund/new',[UserProjectDetailsController::class,'doFundAllocation'])->name('user.foFundAllocation');
Route::get('/project/details/stage5/fund/view',[UserProjectDetailsController::class,'getFundAllocated'])->name('user.getFundAllocated'); 
Route::get('/project/details/stage5/fund/edit/{id}',[UserProjectDetailsController::class,'editBill'])->name('user.editBill');
Route::post('/projects/details/stage5/fund/update',[UserProjectDetailsController::class,'updateFund'])->name('user.update');
Route::delete('/projects/details/stage5/fund/delete/{id}',[UserProjectDetailsController::class,'deleteFund'])->name('user.deleteBill');
Route::post('/projects/details/stage5/submit/bill/{id}',[UserProjectDetailsController::class,'submitBill'])->name('user.submitBill');
Route::get('/projects/details/stage5/implementation/datatable',[UserProjectDetailsController::class,'getImplementationTable'])->name('user.getImplementationTable');
Route::get('/projects/details/implementation/current/request/{id}',[UserProjectDetailsController::class,'requestCurrent'])->name('user.requestCurrent');
Route::post('/projects/details/stage5/implementation/update/{id}',[UserProjectDetailsController::class,'updateCurrent'])->name('user.updateCurrent');
Route::post('/project/details/stage6/completion/new',[UserProjectDetailsController::class,'completionStage'])->name('user.completionStage');
Route::get('/project/details/stag6/completion/view',[UserProjectDetailsController::class,'getCompletion'])->name('user.getCompletion');
Route::get('/download/completion/file',[UserProjectDetailsController::class,'downloadFile'])->name('user.downloadFile');
Route::post('/project/details/completion/update',[UserProjectDetailsController::class,'updateCompletion'])->name('user.updateCompletion');
});


