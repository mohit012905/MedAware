<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\HealthLogController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| Authenticated & Verified User Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Chatbot
    Route::view('/chat', 'chat')->name('chat');

    // Hospitals
    Route::get('/hospitals', [HospitalController::class, 'index'])
        ->name('hospitals');

    // Appointments
    Route::get('/appointments', [AppointmentController::class, 'index'])
        ->name('appointments');

    Route::post('/appointments/store', [AppointmentController::class, 'store'])
        ->name('appointments.store');

    Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])
        ->name('appointments.destroy');

    // Alerts
    Route::get('/alerts', [AlertController::class, 'index'])
        ->name('alerts');

    // Health Logs
    Route::get('/health-logs', [HealthLogController::class, 'index'])
        ->name('health.logs');
});

/*
|--------------------------------------------------------------------------
| Profile Routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';