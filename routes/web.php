<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\UserUserController;
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserRoomController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/user', function () {
    return auth('web')->check()
        ? redirect()->route('dashboard')
        : redirect()->route('user.login');
});
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('admin.login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [UserUserController::class, 'dashboard'])->name('dashboard');
    Route::get('/bookings', [UserUserController::class, 'bookings'])->name('bookings');
    Route::get('/pending', [UserUserController::class, 'pending'])->name('pending');
    Route::get('/comment/{id}', [UserUserController::class, 'comment'])->name('comment');
    Route::post('/comment/{id}', [UserUserController::class, 'comment'])->name('comment');



    Route::resource('userroom', UserRoomController::class);
    // Route::put('/userroom/{id}', [UserRoomController::class, 'update'])->name('userroom.update');

    Route::get('/userroom/type/{type}', [UserRoomController::class, 'showByType'])->name('userroom.type');
Route::post('/userroom/book/{room}', [UserRoomController::class, 'bookRoom'])->name('userroom.book');
Route::post('/userroom/reservation/{room}', [UserRoomController::class, 'doReservation'])->name('userroom.doReservation');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::post('/logout', [ProfileController::class, 'destroy']);
    // Route::post('/logout', [ProfileController::class, 'destroy'])->name('logout');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


});

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
