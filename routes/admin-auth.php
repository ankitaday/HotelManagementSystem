<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReservationsController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\commentController;

// Guest Routes (Only accessible if NOT logged in)
Route::prefix("admin")->middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('admin.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])
        ->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::resource('rooms', RoomController::class);

    Route::resource('reservations', ReservationsController::class);


    Route::resource('users', UserController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::post('/logout', [LoginController::class, 'destroy'])->name('admin.logout');
    Route::get('/pending', [commentController::class, 'pending'])->name('adminPending');
    Route::get('/comment/{id}', [commentController::class, 'comment'])->name('adminComment');
    Route::post('/comment/{id}', [commentController::class, 'comment'])->name('adminComment');
});
