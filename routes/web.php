<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\userController;

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
//unauth
Route::get('/', function () {
    return view('LandingPage');
});

// auth
Route::get('/login',[authController::class,'showLoginForm'])->name('user.login');
Route::post('/login',[authController::class,'login'])->name('user.login');
Route::post('/logout',[authController::class,'logout'])->name('user.logout');
//user
Route::get('/user/{id}',[userController::class,'showLandingUserPage'])->name('user.home');
Route::get('/user/{id}/detail-order/{orderId}',[userController::class,'showDetailOrderUserPage'])->name("user.detail.order");


//admin
Route::get('/admin/{id}',[adminController::class,'showLandingAdminPage'])->name('admin.home');
Route::get('/admin/{id}/register-customer',[adminController::class,'showRegisterCustomerPage'])->name('admin.register.customer');
Route::post('/admin/{id}/register-customer',[adminController::class,'registerUser'])->name('admin.register.customer');

Route::get('/admin/{id}/edit-customer/{customer}',[adminController::class,'showEditCustomerPage'])->name('admin.edit.customer');
Route::put('/admin/{id}/edit-customer/{customer}',[adminController::class,'editUser'])->name('admin.edit.customer');

Route::get('/admin/{id}/track-customer/{customer}',[adminController::class,'showTrackOrderCustomerPage'])->name('admin.track.customer');
Route::get('/admin/{id}/track-customer/{customer}/add',[adminController::class,'showAddOrderPage'])->name('admin.add.order');
Route::post('/admin/{id}/track-customer/{customer}/add',[adminController::class,'addOrder'])->name('admin.add.order');

Route::get('/admin/{id}/track-customer/{customer}/edit/{orderId}',[adminController::class,'showEditOrderPage'])->name('admin.edit.order');
Route::put('/admin/{id}/track-customer/{customer}/edit/{orderId}',[adminController::class,'editOrder'])->name('admin.edit.order');


Route::get('/admin/{id}/track-customer/{customer}/detail-order/{orderId}',[adminController::class,'showDetailOrder'])->name('admin.detail.order');
Route::get('/admin/{id}/track-customer/{customer}/detail-order/{orderId}/add',[adminController::class,'showAddDetailOrder'])->name('admin.add.detail.order');
Route::post('/admin/{id}/track-customer/{customer}/detail-order/{orderId}/add',[adminController::class,'addDetailOrder'])->name('admin.add.detail.order');
Route::get('/admin/{id}/track-customer/{customer}/detail-order/{orderId}/edit/{orderDetailId}',[adminController::class,'showEditDetailOrder'])->name('admin.edit.detail.order');
Route::put('/admin/{id}/track-customer/{customer}/detail-order/{orderId}/edit/{orderDetailId}',[adminController::class,'editDetailOrder'])->name('admin.edit.detail.order');
