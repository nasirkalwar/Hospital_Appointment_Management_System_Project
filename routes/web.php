<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home',[HomeController::class,'redirect']);
Route::get('/',[HomeController::class,'index']);
Route::post('/appointment',[HomeController::class,'appointment']);
Route::get('/my_appointment',[HomeController::class,'my_appointment']);
Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);
Route::get('/contactus',[HomeController::class,'contactus']);
Route::post('/contactus_message',[HomeController::class,'contactus_message']);
Route::get('/doctor_search',[HomeController::class,'doctor_search']);
Route::get('/aboutus',[HomeController::class,'aboutus']);
Route::get('/view_doctors',[HomeController::class,'view_doctors']);
Route::get('/search_doctor',[HomeController::class,'search_doctor']);



Route::get('/add_doctors',[AdminController::class,'add_doctors']);
Route::post('/add_new_doctor',[AdminController::class,'add_new_doctor']);
Route::get('/show_doctors',[AdminController::class,'show_doctors']);
Route::get('/delete_doctors/{id}',[AdminController::class,'delete_doctors']);
Route::get('/show_appointment',[AdminController::class,'show_appointment']);
Route::get('/cancel_appoint/{id}',[AdminController::class,'cancel_appoint']);
Route::get('/approved_appoint/{id}',[AdminController::class,'approved_appoint']);
Route::get('/delete_appoint/{id}',[AdminController::class,'delete_appoint']);
Route::get('/show_contactus',[AdminController::class,'show_contactus']);
Route::get('/send_mail/{id}',[AdminController::class,'send_mail']);
Route::get('/edit_doctors/{id}',[AdminController::class,'edit_doctors']);
Route::get('/doctor_search',[AdminController::class,'doctor_search']);
Route::get('/search_appoint_req',[AdminController::class,'search_appoint_req']);
Route::get('/delete_contactus/{id}',[AdminController::class,'delete_contactus']);