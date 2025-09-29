<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsResident;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', function () {
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

    // Resident Dashboard
    Route::get('/resident/dashboard', function () {
        return view('resident.dashboard'); 
    })->name('resident.dashboard');

    // ✅ Admin-only routes
    Route::middleware(IsAdmin::class)->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.admin_dashboard');
        })->name('dashboard');

        Route::get('/reservations', [ReservationController::class, 'index'])
            ->name('reservation.dashboard');

        Route::get('/reservations/modify', function () {
            return view('admin.modify');
        })->name('reservation.modify');

        Route::get('/reservations/cancel', function () {
            return view('admin.cancel');
        })->name('reservation.cancel');

        Route::get('/users', function () {
            return view('admin.users');
        })->name('admin.users');

        Route::get('/settings', function () {
            return view('admin.settings');
        })->name('admin.settings');
    });

    // Resident-only routes
    Route::middleware(IsResident::class)->prefix('resident')->group(function () {
        // Dashboard
        Route::get('/dashboard', function () {
            return view('resident.resident_dashboard');
        })->name('resident.dashboard');

        // Booking History
        Route::get('/booking-history', function () {
            return view('resident.booking_history');
        })->name('resident.booking.history');

        // Reservation routes (dummy data)
        Route::get('/reservation', function () {
            return view('resident.resident_reservation'); // dummy reservations view
        })->name('resident.reservation');

        // Store new reservation (if you want to keep the POST route for later)
        Route::post('/reservation', [ReservationController::class, 'store'])
            ->name('resident.reservation.store');

        // Add Reservation form - Updated to use make_reservation view
        Route::get('/reservation/add', function () {
            return view('resident.make_reservation');
        })->name('resident.reservation.add');

        // Edit Reservation form
        Route::get('/reservation/{id}/edit', [ReservationController::class, 'edit'])
            ->name('resident.reservation.edit');

        // Update Reservation
        Route::put('/reservation/{id}', [ReservationController::class, 'update'])
            ->name('resident.reservation.update');

        // Delete Reservation
        Route::delete('/reservation/{id}', [ReservationController::class, 'destroy'])
            ->name('resident.reservation.destroy');
    });

    // Default redirect after login based on role
    Route::get('/dashboard', function () {
        if (auth()->role === 'admin') {
            return redirect()->route('dashboard');
        }
        return redirect()->route('resident.dashboard');
    })->name('dashboard');
});