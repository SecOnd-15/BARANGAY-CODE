<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', function() {
    return redirect()->route('login.form');
});

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard route
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');

    // Reservation dashboard route
    Route::get('/admin/reservations', [ReservationController::class, 'index'])
        ->name('reservation.dashboard');

    // Modify Reservation route
  Route::get('/admin/reservations/modify', function() {
    return view('admin.modify_blade');
})->name('reservation.modify');

});
