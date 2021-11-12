<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffDepartmentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;

Route::get('/', [HomeController::class,'home']);
Route::get('login',[CustomerController::class,'customer_login'])->name('customer.login');
Route::post('login',[CustomerController::class,'checkCuslogin'])->name('customer.login');


Route::get('front-login',[FrontController::class,'login'])->name('front.login');



Route::get('/admin/login',[AdminController::class,'login']);
Route::post('admin/login',[AdminController::class,'check_login'])->name('admin.login');
Route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');
Route::get('/booking', [BookingController::class,'booking'])->name('booking');
// Room Type Routes

Route::group(['middleware'=>'admin_auth'],function(){
    
    Route::get('/admin', [AdminController::class,'index']);

    Route::resource('admin/roomtype',RoomtypeController::class);
    Route::get('admin/roomtype/{id}/delete',[RoomtypeController::class,'destroy']);

    Route::resource('admin/room',RoomController::class);
    Route::get('admin/room/{id}/delete',[RoomController::class,'destroy']);

    Route::resource('admin/customer',CustomerController::class);
    Route::get('admin/customer/{id}/delete',[CustomerController::class,'destroy']);

    Route::get('admin/roomtypeimg/{id}/delete',[RoomtypeController::class,'destroy_img']);

    Route::resource('admin/department',StaffDepartmentController::class);
    Route::get('admin/department/{id}/delete',[StaffDepartmentController::class,'destroy']);

    Route::get('admin/staff/payment/{id}/add',[StaffController::class,'addPayment']);
    Route::get('admin/staff/payment/{id}',[StaffController::class,'allPayments'])->name('all.payments');
    Route::post('admin/staff/payment/{id}',[StaffController::class,'savePayment']);
    Route::get('admin/staff/{id}/delete',[StaffController::class,'destroy']);
    Route::resource('admin/staff',StaffController::class);

    Route::get('admin/booking/{id}/delete',[BookingController::class,'destroy']);
    Route::get('admin/booking/availble_rooms/{checkin_date}/{checkout_date}',[BookingController::class,'availbleRoom']);
    Route::get('admin/booking/room_price/{room_id}',[BookingController::class,'roomPrice']);
    Route::resource('admin/booking',BookingController::class);
});