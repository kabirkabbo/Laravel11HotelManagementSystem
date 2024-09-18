<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class,'home']);

Route::get('room_details/{id}',[HomeController::class,'room_details']);

Route::post('add_booking/{id}',[HomeController::class,'add_booking'])->middleware(['auth','verified']);

Route::post('stripe/{price}',[HomeController::class,'stripePost']);

Route::post('contact',[HomeController::class,'contact'])->middleware(['auth','verified']);

Route::get('our_rooms',[HomeController::class,'our_rooms']);

Route::get('contact_us',[HomeController::class,'contact_us']);

Route::get('/dashboard',[HomeController::class,'home'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin_page', [AdminController::class,'index'])->middleware(['auth','admin']);

Route::get('create_room',[AdminController::class,'create_room'])->middleware(['auth','admin']);

Route::post('add_room',[AdminController::class,'add_room'])->middleware(['auth','admin']);

Route::get('view_room',[AdminController::class,'view_room'])->middleware(['auth','admin']);

Route::get('room_delete/{id}',[AdminController::class,'room_delete'])->middleware(['auth','admin']);

Route::get('room_update/{id}',[AdminController::class,'room_update'])->middleware(['auth','admin']);

Route::post('edit_room/{id}',[AdminController::class,'edit_room'])->middleware(['auth','admin']);

Route::get('bookings',[AdminController::class,'bookings'])->middleware(['auth','admin']);

Route::get('delete_booking/{id}',[AdminController::class,'delete_booking'])->middleware(['auth','admin']);

Route::get('approve_booking/{id}',[AdminController::class,'approve_booking'])->middleware(['auth','admin']);

Route::get('reject_booking/{id}',[AdminController::class,'reject_booking'])->middleware(['auth','admin']);

Route::get('view_gallary',[AdminController::class,'view_gallary'])->middleware(['auth','admin']);

Route::post('upload_gallary',[AdminController::class,'upload_gallary'])->middleware(['auth','admin']);

Route::get('delete_gallary/{id}',[AdminController::class,'delete_gallary'])->middleware(['auth','admin']);

Route::get('all_messages',[AdminController::class,'all_messages'])->middleware(['auth','admin']);

Route::get('send_mail/{id}',[AdminController::class,'send_mail'])->middleware(['auth','admin']);

Route::post('mail/{id}',[AdminController::class,'mail'])->middleware(['auth','admin']);



