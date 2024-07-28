<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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
Route::get('/',[LoginController::class,'admin_login'])->name('admin.login');
Route::post('/doAdminLogin',[LoginController::class,'do_admin_login'])->name('do.admin_login');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

//Admin routes
Route::get('/dashboard',[AdminController::class,'admin_home'])->name('admin.home');
Route::get('/forgotPassword',[AdminController::class,'forgot_password'])->name('forgot_password');
Route::post('/submitForgetPasswordForm',[AdminController::class,'submitForgetPasswordForm'])->name('submitForgetPasswordForm');
Route::get('/sendMailReset',[AdminController::class,'send_mail_reset'])->name('send.mail_reset');
Route::get('/changePasswordForm/{token}',[AdminController::class,'change_password_form'])->name('change_password_form');
Route::post('/submitResetPasswordForm',[AdminController::class,'submitResetPasswordForm'])->name('submitResetPasswordForm');
Route::post('/doAddUser',[AdminController::class,'do_add_user'])->name('do.add_user');
Route::get('/dataTable',[AdminController::class,'data_table'])->name('data_table');


//user routes 
Route::get('/users/data', [UserController::class, 'getUserData'])->name('users.data');
Route::get('/home',[UserController::class,'home'])->name('user.home');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
