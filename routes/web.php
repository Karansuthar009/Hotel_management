<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
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
//     return view('home');
// });

Route::get('/',[HomeController::class,'home']);
Route::get('service/{id}',[HomeController::class,'service_detail']);
Route::get('customer/add-testimonial',[HomeController::class,'add_testimonial']);
Route::post('customer/save-testimonial',[HomeController::class,'save_testimonial']);

//admin login
Route::get('admin/login',[AdminController::class,'login']);
Route::post('admin/login',[AdminController::class,'login_check']);
Route::get('admin/logout',[AdminController::class,'logout']);

//admin dashboard
Route::get('admin/',[AdminController::class,'dashboard']);

//Roomtype route
Route::resource('admin/roomtype',RoomTypeController::class);
Route::get('admin/roomtype/delete/{id}',[RoomTypeController::class,'destroy']);
Route::get('admin/roomtypeimage/delete/{photo_id}',[RoomTypeController::class,'destroy_photo']);

//Room route
Route::resource('admin/room',RoomController::class);
Route::get('admin/room/delete/{id}',[RoomController::class,'destroy']);

//Customer route
Route::resource('admin/customer',CustomerController::class);
Route::get('admin/customer/delete/{id}',[CustomerController::class,'destroy']);

//department route
Route::resource('admin/department',DepartmentController::class);
Route::get('admin/department/delete/{id}',[DepartmentController::class,'destroy']);

//staff route
Route::resource('admin/staff',StaffController::class);
Route::get('admin/staff/delete/{id}',[StaffController::class,'destroy']);
Route::get('admin/staff/payment/{staff_id}/add_payment',[StaffController::class,'add_payment']);
Route::post('admin/staff/payment/{staff_id}',[StaffController::class,'save_payment']);
Route::get('admin/staff/payment/{staff_id}',[StaffController::class,'all_payment']);
Route::get('admin/staffpayment/delete/{staff_id}',[StaffController::class,'delete_payment']);

//booking route
Route::resource('admin/booking',BookingController::class);
Route::get('admin/booking/delete/{id}',[BookingController::class,'destroy']);
Route::get('admin/booking/available-room/{checkin_date}', [BookingController::class,'availableRooms']);


//customer login register and logout
Route::get('login',[CustomerController::class,'login']);
Route::post('customer/login',[CustomerController::class,'customer_login']);
Route::get('register',[CustomerController::class,'register']);
Route::get('logout',[CustomerController::class,'logout']);

//front booking
Route::get('booking',[BookingController::class,'front_booking']);
Route::get('booking/success',[BookingController::class,'booking_payment_success'])->name('booking.success');
Route::get('booking/fail',[BookingController::class,'booking_payment_fail'])->name('booking.fail');

//service 
Route::resource('admin/service',ServiceController::class);
Route::get('admin/service/delete/{id}',[ServiceController::class,'destroy']);
