<?php
//Admin Controllers
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\DonorController;
use App\Http\Controllers\admin\MarkazOrphanCareController;
use App\Http\Controllers\admin\EducationCenterAppController;
use App\Http\Controllers\admin\SweetWaterProjectController;
use App\Http\Controllers\admin\CulturalCenterAppController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\ProjectDetailsController;
use App\Http\Controllers\admin\ConstructionController;
use App\Http\Controllers\admin\DifferenltlyAbledController;
use App\Http\Controllers\admin\FamilyController;
use App\Http\Controllers\admin\GeneralProjectController;
use App\Http\Controllers\admin\ShopController;
use App\Http\Controllers\admin\HouseController;
use App\Http\Controllers\admin\MedicalController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\DisplayProjectController;
use App\Http\Controllers\admin\ODFProjectController;
use App\Http\Controllers\admin\diffProjectController;
use App\Http\Controllers\admin\familyProjectController;
use App\Http\Controllers\admin\HRController;





//user Controllers
use App\Http\Controllers\user\usersController;
use App\Http\Controllers\user\userProjectController;
use App\Http\Controllers\user\UserProjectDetailsController;
use App\Http\Controllers\user\userMarkazOrphanCareController;
use App\Http\Controllers\user\userEducationCentreController;
use App\Http\Controllers\user\userSweetWaterProjectController;
use App\Http\Controllers\user\userCulturalCentreController;
use App\Http\Controllers\user\userApplicationController;
use App\Http\Controllers\user\userMedicalController;
use App\Http\Controllers\user\userDifferentlyAbledController;
use App\Http\Controllers\user\userConstructionController;
use App\Http\Controllers\user\userFamilyController;
use App\Http\Controllers\user\userGeneralProjectController;
use App\Http\Controllers\user\userShopController;
use App\Http\Controllers\user\userHouseController;
use App\Http\Controllers\user\userDisplayProjectController;
use App\Http\Controllers\user\userodfController; 
use App\Http\Controllers\user\userdiffController; 
use App\Http\Controllers\user\userFamilyProjectController;
use App\Http\Controllers\EmployeeController;
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
Route::prefix('admin')->middleware(['auth', 'role:1,2,6'])->group(function ()
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
//project routes
Route::get('/projects/view',[ProjectController::class,'getProjects'])->name('admin.getProjects');
Route::post('/projects/new',[ProjectController::class,'doProject'])->name('admin.doProject');
Route::get('/projects/datatable',[ProjectController::class,'getProjectData'])->name('admin.getProjectData');
Route::get('/projects/view/more/{id}',[ProjectController::class,'projectViewMore'])->name('admin.projectViewMore');
Route::get('/projects/edit/{id}',[ProjectController::class,'editProject'])->name('admin.editProject');
Route::post('projects/update',[ProjectController::class,'updateProject'])->name('admin.updateProject');
Route::delete('projects/delete/{id}',[ProjectController::class, 'deleteProject'])->name('admin.deleteProject');  
//orphan care project routes
Route::post('/projects/odf/new',[ODFProjectController::class,'doodfProject'])->name('admin.doodfProject');
Route::post('/projects/odf/datatable',[ODFProjectController::class,'getodfProjectData'])->name('admin.getodfProjectData');
Route::get('/projects/odf/view/more/{id}',[ODFProjectController::class,'projectodfViewMore'])->name('admin.projectodfViewMore');
Route::get('/projects/odf/edit/{id}',[ODFProjectController::class,'editodfProject'])->name('admin.editodfProject');
Route::post('projects/odf/update',[ODFProjectController::class,'updateodfProject'])->name('admin.updateodfProject');
Route::delete('projects/odf/delete/{id}',[ODFProjectController::class, 'deleteodfProject'])->name('admin.deleteodfProject');
//Allocate fund 
Route::get('/project/odf/fund/view',[ODFProjectController::class,'odfFundview'])->name('admin.odfFundview');
Route::post('/project/odf/fund/new',[ODFProjectController::class,'addFund'])->name('admin.addFund');
Route::get('/project/odf/current/view',[ODFProjectController::class,'getCurrent'])->name('admin.getCurrrent');
Route::post('/project/odf/current/update',[ODFProjectController::class,'updateCurrent'])->name('admin.updateCurrrent');
Route::post('/project/odf/status/update/{id}',[ODFProjectController::class,'updateStatus'])->name('admin.updateStatus');


//Differently Abled Project Routes
Route::post('/projects/diff/new',[diffProjectController::class,'dodiffProject'])->name('admin.dodiffProject');
Route::post('/projects/diff/datatable',[diffProjectController::class,'getdiffProjectData'])->name('admin.getdiffProjectData');
Route::get('/projects/diff/view/more/{id}',[diffProjectController::class,'projectdiffViewMore'])->name('admin.projectdiffViewMore');
Route::get('/projects/diff/edit/{id}',[diffProjectController::class,'editdiffProject'])->name('admin.editdiffProject');
Route::post('projects/diff/update',[diffProjectController::class,'updatediffProject'])->name('admin.updatediffProject');
Route::delete('projects/diff/delete/{id}',[diffProjectController::class, 'deletediffProject'])->name('admin.deletediffProject');
//Allocate fund 
Route::get('/project/diff/fund/view',[diffProjectController::class,'diffFundview'])->name('admin.diffFundview');
Route::post('/project/diff/fund/new',[diffProjectController::class,'adddiffFund'])->name('admin.adddiffFund');
Route::get('/project/diff/current/view',[diffProjectController::class,'getdiffCurrent'])->name('admin.getdiffCurrrent');
Route::post('/project/diff/current/update',[diffProjectController::class,'updatediffCurrent'])->name('admin.updatediffCurrrent');
Route::post('/project/diff/status/update/{id}',[diffProjectController::class,'updatediffStatus'])->name('admin.updatediffStatus');


//Family Aid Project routes
Route::post('/projects/family/new',[familyProjectController::class,'dofamilyProject'])->name('admin.dofamilyProject');
Route::post('/projects/family/datatable',[familyProjectController::class,'getfamilyProjectData'])->name('admin.getfamilyProjectData');
Route::get('/projects/family/view/more/{id}',[familyProjectController::class,'projectfamilyViewMore'])->name('admin.projectfamilyViewMore');
Route::get('/projects/family/edit/{id}',[familyProjectController::class,'editfamilyProject'])->name('admin.editfamilyProject');
Route::post('projects/family/update',[familyProjectController::class,'updatefamilyProject'])->name('admin.updatefamilyProject');
Route::delete('projects/family/delete/{id}',[familyProjectController::class, 'deletefamilyProject'])->name('admin.deletefamilyProject');
//Allocate fund 
Route::get('/project/family/fund/view',[familyProjectController::class,'familyFundview'])->name('admin.familyFundview');
Route::post('/project/family/fund/new',[familyProjectController::class,'addfamilyFund'])->name('admin.addfamilyFund');
Route::get('/project/family/current/view',[familyProjectController::class,'getfamilyCurrent'])->name('admin.getfamilyCurrrent');
Route::post('/project/family/current/update',[familyProjectController::class,'updatefamilyCurrent'])->name('admin.updatefamilyCurrrent');
Route::post('/project/family/status/update/{id}',[familyProjectController::class,'updatefamilyStatus'])->name('admin.updatefamilyStatus');





//project details route
Route::get('/project/details/view/{id}',[ProjectDetailsController::class,'getProjectDetails'])->name('admin.getProjectDetails');
Route::post('/projects/details/do',[ProjectDetailsController::class,'doProjectDetails'])->name('admin.doProjectDetails');
Route::post('/projects/details/approval/{id}',[ProjectDetailsController::class,'projectApproval'])->name('admin.projectApproval');
Route::post('/project/details/applicant/approve/{id}',[ProjectDetailsController::class,'applicantApprove'])->name('admin.applicantApprove');
Route::get('/download-document',[ProjectDetailsController::class,'download'])->name('admin.download'); 
Route::post('/project/details/files/approve/{proId}',[ProjectDetailsController::class,'fileApproval'])->name('admin.fileApproval');
Route::get('/project/details/stage4/fund/view',[ProjectDetailsController::class,'fundAllocatedView'])->name('admin.fundAllocatedView'); 
Route::get('/project/details/stage5/implementation/datatable',[ProjectDetailsController::class,'viewImplementation'])->name('admin.viewImplementation');
Route::post('/project/details/stage5/bill/approve/{id}',[ProjectDetailsController::class,'billApprove'])->name('admin.billApprove');
Route::post('/project/details/stage6/completion/approve/{id}',[ProjectDetailsController::class,'approveCompletion'])->name('admin.approveCompletion');
Route::get('/download/completion/file',[ProjectDetailsController::class,'downloadFile'])->name('admin.downloadFile');
Route::post('/projects/details/notifications/{id}/mark-as-read', [ProjectDetailsController::class, 'markAsRead'])->name('notifications.markAsRead'); 

//construction project 
Route::get('/construction/project/view',[ConstructionController::class,'getConstruction'])->name('admin.getConstruction');
//differently abled
Route::get('/applications/differenltly/abled/view',[DifferenltlyAbledController::class,'getDifferentlyAbled'])->name('admin.DifferentlyAbled');
Route::post('/application/differently/abled/new',[DifferenltlyAbledController::class,'doDifferentlyAbled'])->name('admin.doDifferentlyabled');
Route::get('/application/differently/abled/datatable',[DifferenltlyAbledController::class,'viewDifferentlyabled'])->name('admin.viewDifferentlyabled'); 
Route::get('/application/differently/abled/view/more/{id}',[DifferenltlyAbledController::class,'diffViewMore'])->name('admin.diffViewMore');
Route::get('/application/diffabled/edit/{id}',[DifferenltlyAbledController::class,'EditDiffAbled'])->name('admin.EditDiffAbled');
Route::post('/application/diffabled/update',[DifferenltlyAbledController::class,'updateDiffAbled'])->name('admin.UpdateDiffAbled');
Route::delete('/application/diffabled/delete/{id}',[DifferenltlyAbledController::class,'deleteDiffAbled'])->name('admin.deleteDiffabled');

//family welfare 
Route::get('/application/family/welfare/view',[FamilyController::class,'getFamilyView'])->name('admin.getFamily');
Route::post('/application/family/welfare/new',[FamilyController::class,'doFamilyWelfare'])->name('admin.familyWelfare');
Route::get('/application/family/welfare/datatable',[FamilyController::class,'familyDataTable'])->name('admin.familyDataTable');
Route::get('/application/family/welfare/view/more/{id}',[FamilyController::class,'viewMoreFamily'])->name('admin.viewMoreFamily');
Route::get('/application/family/welfare/edit/{id}',[FamilyController::class,'editFamily'])->name('admin.editFamily');
Route::post('/application/family/welfare/update',[FamilyController::class,'updateFamily'])->name('admin.updateFamily');
Route::delete('/application/family/welfare/delete/{id}',[FamilyController::class,'deleteFamily'])->name('admin.deleteFamily');

//general project 
Route::get('/application/general/project/view',[GeneralProjectController::class,'getGeneralProject'])->name('admin.getGeneralProject');
Route::post('/application/general/type/new',[GeneralProjectController::class,'doappType'])->name('admin.doappType');
Route::post('/application/general/project/new',[GeneralProjectController::class,'doGeneralProject'])->name('admin.doGeneralProject');
Route::get('/application/general/project/datatable',[GeneralProjectController::class,'generalDatatable'])->name('admin.generalDatatable');
Route::get('/application/general/project/view/more/{id}',[GeneralProjectController::class,'viewMoreGeneral'])->name('admin.viewMoreGeneral');
Route::get('/application/general/project/edit/{id}',[GeneralProjectController::class,'generalProjectEdit'])->name('admin.generalProjectEdit');
Route::post('/application/general/project/update',[GeneralProjectController::class,'updateGeneral'])->name('admin.updateGeneral'); 
Route::delete('/application/general/project/delete/{id}',[GeneralProjectController::class,'deleteGeneral'])->name('admin.deleteGeneral');


//shops and others route 
Route::get('/construction/project/shops/others/view',[ShopController::class,'getShopAndOthers'])->name('admin.getShopAndOthers');
Route::post('/construction/project/shops/others/new',[ShopController::class,'doShopAndOthers'])->name('admin.doShopAndOthers');
Route::get('/construction/project/shops/others/datatable',[ShopController::class,'viewShopAndOther'])->name('admin.viewShopAndOther');
Route::get('/construction/project/shops/others/view/more/{id}',[ShopController::class,'viewMoreShopAndOther'])->name('admin.viewMoreShopAndOther');
Route::get('/construction/project/shops/others/edit/{id}',[ShopController::class,'EditShopAndOther'])->name('admin.EditShopAndOther');
Route::post('/construction/project/shops/others/update',[ShopController::class,'updateShopAndOther'])->name('admin.updateShopAndOther');
Route::delete('/construction/project/shops/others/delete/{id}',[ShopController::class,'deleteShopAndOther'])->name('admin.deleteAhopAndOther');

//Dream house Routes 
Route::get('/construction/project/house/view',[HouseController::class,'getHouse'])->name('admin.getHouse');
Route::post('/construction/project/house/new',[HouseController::class,'doHouse'])->name('admin.doHouse');
Route::get('/construction/project/house/datatable',[HouseController::class,'viewHouse'])->name('admin.viewHouse');
Route::get('/construction/project/house/view/more/{id}',[HouseController::class,'viewMoreHouse'])->name('admin.viewMoreHouse');
Route::get('/construction/project/house/edit/{id}',[HouseController::class,'EditHouse'])->name('admin.EditHouse');
Route::post('/construction/project/house/update',[HouseController::class,'updateHouse'])->name('admin.updateHouse');
Route::delete('/construction/project/house/delete/{id}',[HouseController::class,'deleteHouse'])->name('admin.deleteHouse');

//medical centre routes 
Route::get('/construction/project/medical/view',[MedicalController::class,'getMedical'])->name('admin.getMedical');
Route::post('/construction/project/medical/new',[MedicalController::class,'doMedical'])->name('admin.doMedical');
Route::get('/construction/project/medical/datatable',[MedicalController::class,'viewMedical'])->name('admin.viewMedical');
Route::get('/construction/project/medical/view/more/{id}',[MedicalController::class,'viewMoreMedical'])->name('admin.viewMoreMedical');
Route::get('/construction/project/medical/edit/{id}',[MedicalController::class,'EditMedical'])->name('admin.EditMedical');
Route::post('/construction/project/medical/update',[MedicalController::class,'updateMedical'])->name('admin.updateMedical');
Route::delete('/construction/project/medical/delete/{id}',[MedicalController::class,'deleteMedical'])->name('admin.deleteMedical');
Route::get('/construction/project/view/under/project',[ConstructionController::class,'getProConstruction'])->name('admin.getProConstruction');



//display project routes 
Route::get('/project/sweetwater',[DisplayProjectController::class,'sweet'])->name('admin.sweet');
Route::get('/projects/datatable/sweet',[DisplayProjectController::class,'getSweetProjectData'])->name('admin.getSweetProjectData');
Route::get('/project/orphancare',[DisplayProjectController::class,'orphancare'])->name('admin.orphancare');
Route::get('/projects/datatable/orphancare',[DisplayProjectController::class,'getOrphanCareProjectData'])->name('admin.getOrphanCareProjectData');
Route::get('/projects/diffabled',[DisplayProjectController::class,'diffabled'])->name('admin.diffabled');
Route::get('/projects/datatable/diffabled',[DisplayProjectController::class,'getDiffabledProjectData'])->name('admin.getDiffabledProjectData');
Route::get('/projects/familyaid',[DisplayProjectController::class,'familyaid'])->name('admin.familyaid');
Route::get('/projects/datatable/familyaid',[DisplayProjectController::class,'getfamilyaidProjectData'])->name('admin.getfamilyaidProjectData');
Route::get('/projects/general',[DisplayProjectController::class,'general'])->name('admin.general');
Route::get('/projects/datatable/general',[DisplayProjectController::class,'getgeneralProjectData'])->name('admin.getgeneralProjectData');
//display construction project routes 
Route::get('/projects/education',[DisplayProjectController::class,'education'])->name('admin.education');
Route::get('/projects/datatable/education',[DisplayProjectController::class,'geteducationProjectData'])->name('admin.geteducationProjectData');
Route::get('/projects/cultural',[DisplayProjectController::class,'cultural'])->name('admin.cultural');
Route::get('/projects/datatable/cultural',[DisplayProjectController::class,'getculturalProjectData'])->name('admin.getculturalProjectData');
Route::get('/projects/hospital',[DisplayProjectController::class,'hospital'])->name('admin.hospital');
Route::get('/projects/datatable/hospital',[DisplayProjectController::class,'gethospitalProjectData'])->name('admin.gethospitalProjectData');
Route::get('/projects/shops',[DisplayProjectController::class,'shops'])->name('admin.shops');
Route::get('/projects/datatable/shops',[DisplayProjectController::class,'getshopsProjectData'])->name('admin.getshopsProjectData');
Route::get('/projects/house',[DisplayProjectController::class,'house'])->name('admin.house');
Route::get('/projects/datatable/house',[DisplayProjectController::class,'gethouseProjectData'])->name('admin.gethouseProjectData');



//bills material approval
Route::post('/project/details/stage5/hod/material/approval/{id}',[ProjectDetailsController::class,'materialsApprovalHod'])->name('admin.materialsApprovalHod');
Route::post('/project/details/stage5/coo/material/approval/{id}',[ProjectDetailsController::class,'materialsApprovalCoo'])->name('admin.materialsApprovalCoo');
// Route::get('/project/details/bill/status',[ProjectDetailsController::class,'getCooBillStatus'])->name('admin.getCooBillStatus');

Route::get('/project/details/bill/pie-chart', [ProjectDetailsController::class, 'getPieChart'])->name('admin.piechart');
Route::get('/project/details/download/pdf', [ProjectDetailsController::class, 'downloadPdf'])->name('admin.projectdownload');


//hr routes 
Route::get('/hr/module',[HRController::class,'getHRModule'])->name('admin.getHRModule');
Route::post('/hr/module/employee/new',[HRController::class,'newEmployee'])->name('admin.newEmployee');
Route::get('/hr/module/employee/name/{id}',[HRController::class,'getEmployeeName'])->name('admin.getEmployeeName');
Route::post('/hr/module/employee',[HRController::class,'empDatatable'])->name('admin.empDatatable');
Route::get('/hr/module/employee/edit/{id}',[HRController::class,'editEmployee'])->name('admin.editEmployee');
Route::post('/hr/module/employee/update',[HRController::class,'updateEmployee'])->name('admin.updateEmployee');
Route::get('/hr/module/employee/leave/details/{id}',[HRController::class,'leaveDetails'])->name('admin.leaveDetails');
});  




Route::prefix('user')->middleware(['auth', 'role:3,4,5'])->group(function ()
 {
 Route::get('/home',[usersController::class,'home'])->name('user.home');
 Route::get('/project/view',[userProjectController::class,'getUserProject'])->name('user.userProject');
 Route::get('/projects/datatable',[userProjectController::class,'getProjectData'])->name('user.getProjectData');
 Route::get('/project/details/view/{id}',[UserProjectDetailsController::class,'getProjectDetails'])->name('user.getProjectDetails');
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
Route::get('/project/details/completion/edit/{id}',[UserProjectDetailsController::class,'editCompletion'])->name('user.editCompletion');
Route::post('/project/details/completion/update',[UserProjectDetailsController::class,'updateCompletion'])->name('user.updateCompletion');
Route::post('/project/details/stage4/fund/approve/{id}',[UserProjectDetailsController::class,'fundApproval'])->name('user.fundApproval');
//construction project 
Route::get('/construction/project/view',[userConstructionController::class,'getConstruction'])->name('user.getConstruction');
//differently abled
Route::get('/applications/differenltly/abled/view',[userDifferentlyAbledController::class,'getDifferentlyAbled'])->name('user.DifferentlyAbled');
Route::post('/application/differently/abled/new',[userDifferenltyAbledController::class,'doDifferentlyAbled'])->name('user.doDifferentlyabled');
Route::get('/application/differently/abled/datatable',[userDifferentlyAbledController::class,'viewDifferentlyabled'])->name('user.viewDifferentlyabled'); 
Route::get('/application/differently/abled/view/more/{id}',[userDifferentlyAbledController::class,'diffViewMore'])->name('user.diffViewMore');
Route::get('/application/diffabled/edit/{id}',[userDifferentlyAbledController::class,'EditDiffAbled'])->name('user.EditDiffAbled');
Route::post('/application/diffabled/update',[userDifferentlyAbledController::class,'updateDiffAbled'])->name('user.UpdateDiffAbled');
Route::delete('/application/diffabled/delete/{id}',[userDifferentlyAbledController::class,'deleteDiffAbled'])->name('user.deleteDiffabled');


//family welfare 
Route::get('/application/family/welfare/view',[userFamilyController::class,'getFamilyView'])->name('user.getFamily');
Route::post('/application/family/welfare/new',[userFamilyController::class,'doFamilyWelfare'])->name('user.familyWelfare');
Route::get('/application/family/welfare/datatable',[userFamilyController::class,'familyDataTable'])->name('user.familyDataTable');
Route::get('/application/family/welfare/view/more/{id}',[userFamilyController::class,'viewMoreFamily'])->name('user.viewMoreFamily');
Route::get('/application/family/welfare/edit/{id}',[userFamilyController::class,'editFamily'])->name('user.editFamily');
Route::post('/application/family/welfare/update',[userFamilyController::class,'updateFamily'])->name('user.updateFamily');
Route::delete('/application/family/welfare/delete/{id}',[userFamilyController::class,'deleteFamily'])->name('user.deleteFamily');

//general project 
Route::get('/application/general/project/view',[userGeneralProjectController::class,'getGeneralProject'])->name('user.getGeneralProject');
Route::post('/application/general/type/new',[userGeneralProjectController::class,'doappType'])->name('user.doappType');
Route::post('/application/general/project/new',[userGeneralProjectController::class,'doGeneralProject'])->name('user.doGeneralProject');
Route::get('/application/general/project/datatable',[userGeneralProjectController::class,'generalDatatable'])->name('user.generalDatatable');
Route::get('/application/general/project/view/more/{id}',[GeneralProjectController::class,'viewMoreGeneral'])->name('user.viewMoreGeneral');
Route::get('/application/general/project/edit/{id}',[userGeneralProjectController::class,'generalProjectEdit'])->name('user.generalProjectEdit');
Route::post('/application/general/project/update',[userGeneralProjectController::class,'updateGeneral'])->name('user.updateGeneral'); 
Route::delete('/application/general/project/delete/{id}',[userGeneralProjectController::class,'deleteGeneral'])->name('user.deleteGeneral');


//shops and others route 
Route::get('/construction/project/shops/others/view',[userShopController::class,'getShopAndOthers'])->name('user.getShopAndOthers');
Route::post('/construction/project/shops/others/new',[userShopController::class,'doShopAndOthers'])->name('user.doShopAndOthers');
Route::get('/construction/project/shops/others/datatable',[userShopController::class,'viewShopAndOther'])->name('user.viewShopAndOther');
Route::get('/construction/project/shops/others/view/more/{id}',[userShopController::class,'viewMoreShopAndOther'])->name('user.viewMoreShopAndOther');
Route::get('/construction/project/shops/others/edit/{id}',[userShopController::class,'EditShopAndOther'])->name('user.EditShopAndOther');
Route::post('/construction/project/shops/others/update',[userShopController::class,'updateShopAndOther'])->name('user.updateShopAndOther');
Route::delete('/construction/project/shops/others/delete/{id}',[userShopController::class,'deleteShopAndOther'])->name('user.deleteAhopAndOther');

//Dream house Routes 
Route::get('/construction/project/house/view',[userHouseController::class,'getHouse'])->name('user.getHouse');
Route::post('/construction/project/house/new',[userHouseController::class,'doHouse'])->name('user.doHouse');
Route::get('/construction/project/house/datatable',[userHouseController::class,'viewHouse'])->name('user.viewHouse');
Route::get('/construction/project/house/view/more/{id}',[userHouseController::class,'viewMoreHouse'])->name('user.viewMoreHouse');
Route::get('/construction/project/house/edit/{id}',[userHouseController::class,'EditHouse'])->name('user.EditHouse');
Route::post('/construction/project/house/update',[userHouseController::class,'updateHouse'])->name('user.updateHouse');
Route::delete('/construction/project/house/delete/{id}',[userHouseController::class,'deleteHouse'])->name('user.deleteHouse');



Route::get('/construction/project/medical/view',[userMedicalController::class,'getMedical'])->name('user.getMedical');
Route::post('/construction/project/medical/new',[userMedicalController::class,'doMedical'])->name('user.doMedical');
Route::get('/construction/project/medical/datatable',[userMedicalController::class,'viewMedical'])->name('user.viewMedical');
Route::get('/construction/project/medical/view/more/{id}',[userMedicalController::class,'viewMoreMedical'])->name('user.viewMoreMedical');
Route::get('/construction/project/medical/edit/{id}',[userMedicalController::class,'EditMedical'])->name('user.EditMedical');
Route::post('/construction/project/medical/update',[userMedicalController::class,'updateMedical'])->name('user.updateMedical');
Route::delete('/construction/project/medical/delete/{id}',[userMedicalController::class,'deleteMedical'])->name('user.deleteMedical');
Route::get('/construction/project/view/under/project',[userConstructionController::class,'getProConstruction'])->name('user.getProConstruction');


//display project routes 
Route::get('/project/sweetwater',[userDisplayProjectController::class,'sweet'])->name('user.sweet');
Route::get('/projects/datatable/sweet',[userDisplayProjectController::class,'getSweetProjectData'])->name('user.getSweetProjectData');
Route::get('/project/orphancare',[userDisplayProjectController::class,'orphancare'])->name('user.orphancare');
Route::get('/projects/datatable/orphancare',[userDisplayProjectController::class,'getOrphanCareProjectData'])->name('user.getOrphanCareProjectData');
Route::get('/projects/diffabled',[userDisplayProjectController::class,'diffabled'])->name('user.diffabled');
Route::get('/projects/datatable/diffabled',[userDisplayProjectController::class,'getDiffabledProjectData'])->name('user.getDiffabledProjectData');
Route::get('/projects/familyaid',[userDisplayProjectController::class,'familyaid'])->name('user.familyaid');
Route::get('/projects/datatable/familyaid',[userDisplayProjectController::class,'getfamilyaidProjectData'])->name('user.getfamilyaidProjectData');
Route::get('/projects/general',[userDisplayProjectController::class,'general'])->name('user.general');
Route::get('/projects/datatable/general',[userDisplayProjectController::class,'getgeneralProjectData'])->name('user.getgeneralProjectData');


//display construction project routes 
Route::get('/projects/education',[userDisplayProjectController::class,'education'])->name('user.education');
Route::get('/projects/datatable/education',[userDisplayProjectController::class,'geteducationProjectData'])->name('user.geteducationProjectData');
Route::get('/projects/cultural',[userDisplayProjectController::class,'cultural'])->name('user.cultural');
Route::get('/projects/datatable/cultural',[userDisplayProjectController::class,'getculturalProjectData'])->name('user.getculturalProjectData');
Route::get('/projects/hospital',[userDisplayProjectController::class,'hospital'])->name('user.hospital');
Route::get('/projects/datatable/hospital',[userDisplayProjectController::class,'gethospitalProjectData'])->name('user.gethospitalProjectData');
Route::get('/projects/shops',[userDisplayProjectController::class,'shops'])->name('user.shops');
Route::get('/projects/datatable/shops',[userDisplayProjectController::class,'getshopsProjectData'])->name('user.getshopsProjectData');
Route::get('/projects/house',[userDisplayProjectController::class,'house'])->name('user.house');
Route::get('/projects/datatable/house',[userDisplayProjectController::class,'gethouseProjectData'])->name('user.gethouseProjectData');



//bills table approval 
Route::post('/project/details/stage5/pmt/material/approval/{id}',[UserProjectDetailsController::class,'materialsApprovalPmt'])->name('user.materialsApproval');
Route::post('/project/details/stage5/fm/material/approval/{id}',[UserProjectDetailsController::class,'materialsApprovalFm'])->name('user.materialsApprovalFm');
// routes/web.php
Route::get('/project/details/bill/pie-chart', [UserProjectDetailsController::class, 'getPieChart'])->name('user.piechart');
// Route::get('/project/details/bill/status',[UserProjectDetailsController::class,'getCooBillStatus'])->name('user.getCooBillStatus');
Route::get('/project/details/download/pdf', [UserProjectDetailsController::class, 'downloadPdf'])->name('user.projectdownload');
Route::get('/projects/details/implementation/utilized/{id}',[UserProjectDetailsController::class,'editUtilized'])->name('user.editUtilized');
Route::post('/projects/details/stage5/utilized/update/{id}',[UserProjectDetailsController::class,'updateUtilized'])->name('user.updateUtilized');

//odf project routes
Route::post('/projects/odf/new',[userodfController::class,'doodfProject'])->name('user.doodfProject');
Route::post('/projects/odf/datatable',[userodfController::class,'getodfProjectData'])->name('user.getodfProjectData');
Route::get('/projects/odf/view/more/{id}',[userodfController::class,'projectodfViewMore'])->name('user.projectodfViewMore');
Route::get('/projects/odf/edit/{id}',[userodfController::class,'editodfProject'])->name('user.editodfProject');
Route::post('projects/odf/update',[userodfController::class,'updateodfProject'])->name('user.updateodfProject');
Route::delete('projects/odf/delete/{id}',[userodfController::class, 'deleteodfProject'])->name('user.deleteodfProject');
//Allocate fund 
Route::get('/project/odf/fund/view',[userodfController::class,'odfFundview'])->name('user.odfFundview');
Route::post('/project/odf/fund/new',[userodfController::class,'addFund'])->name('user.addFund');
Route::post('/project/odf/status/update/{id}',[userodfController::class,'updateStatus'])->name('user.updateStatus');
Route::post('/project/odf/paid/update/{id}',[userodfController::class,'updatepaymentStatus'])->name('user.updatepaymentStatus'); 

//differently abled project routes
Route::post('/projects/diff/datatable',[userdiffController::class,'getdiffProjectData'])->name('user.getdiffProjectData');
Route::get('/projects/diff/view/more/{id}',[userdiffController::class,'projectdiffViewMore'])->name('user.projectdiffViewMore');
Route::get('/projects/diff/edit/{id}',[userdiffController::class,'editdiffProject'])->name('user.editdiffProject');
Route::post('projects/diff/update',[userdiffController::class,'updatediffProject'])->name('user.updatediffProject');
Route::delete('projects/diff/delete/{id}',[userdiffController::class, 'deletediffProject'])->name('user.deletediffProject');
//Allocate fund 
Route::get('/project/diff/fund/view',[userdiffController::class,'diffFundview'])->name('user.diffFundview');
Route::post('/project/diff/fund/new',[userdiffController::class,'adddiffFund'])->name('user.adddiffFund');
Route::get('/project/diff/current/view',[userdiffController::class,'getdiffCurrent'])->name('user.getdiffCurrrent');
Route::post('/project/diff/current/update',[userdiffController::class,'updatediffCurrent'])->name('user.updatediffCurrrent');
Route::post('/project/diff/status/update/{id}',[userdiffController::class,'updatediffStatus'])->name('user.updatediffStatus');
Route::post('/project/diff/paid/update/{id}',[userdiffController::class,'updatediffpaymentStatus'])->name('user.updatediffpaymentStatus');
//family aid routes
Route::post('/projects/family/datatable',[userFamilyProjectController::class,'getfamilyProjectData'])->name('user.getfamilyProjectData');
Route::get('/projects/family/view/more/{id}',[userFamilyProjectController::class,'projectfamilyViewMore'])->name('user.projectfamilyViewMore');
Route::get('/projects/family/edit/{id}',[userFamilyProjectController::class,'editfamilyProject'])->name('user.editfamilyProject');
Route::post('projects/family/update',[userFamilyProjectController::class,'updatefamilyProject'])->name('user.updatefamilyProject');
Route::delete('projects/family/delete/{id}',[userFamilyProjectController::class, 'deletefamilyProject'])->name('user.deletefamilyProject');
//Allocate fund 
Route::get('/project/family/fund/view',[userFamilyProjectController::class,'familyFundview'])->name('user.familyFundview');
Route::post('/project/family/fund/new',[userFamilyProjectController::class,'addfamilyFund'])->name('user.addfamilyFund');
Route::get('/project/family/current/view',[userFamilyProjectController::class,'getfamilyCurrent'])->name('user.getfamilyCurrrent');
Route::post('/project/family/current/update',[userFamilyProjectController::class,'updatefamilyCurrent'])->name('user.updatefamilyCurrrent');
Route::post('/project/family/status/update/{id}',[userFamilyProjectController::class,'updatefamilyStatus'])->name('user.updatefamilyStatus');
Route::post('/project/family/paid/update/{id}',[userFamilyProjectController::class,'updatefamilypaymentStatus'])->name('user.updatefamilypaymentStatus');

});
Route::prefix('employee')->middleware(['auth', 'role:7'])->group(function ()
{
Route::get('/dashboard',[EmployeeController::class,'getEmployeeDashboard'])->name('employee.empdashboard');
Route::post('/leave/request/new',[EmployeeController::class,'doLeaveRequest'])->name('employee.doLeaveRequest');
Route::get('/profile/view',[EmployeeController::class,'viewProfile'])->name('employee.viewProfile');
});


