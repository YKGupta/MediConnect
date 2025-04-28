<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'userDashboard'])
    ->middleware(['auth', 'verified', 'role:user'])
    ->name('dashboard');

Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
    ->middleware(['auth', 'verified', 'role:admin'])
    ->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/emergency/report', [EmergencyController::class, 'create'])->name('emergency.create');
    Route::post('/emergency/report', [EmergencyController::class, 'store']);
});

Route::get('/facilities', [FacilityController::class, 'index']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/emergencies', [AdminController::class, 'index']);
    Route::post('/admin/emergencies/{id}/status', [AdminController::class, 'updateStatus']);
});

Route::put('/admin/emergencies/{id}/status', [EmergencyController::class, 'updateStatus'])
    ->middleware(['auth', 'verified', 'role:admin'])
    ->name('emergency.update.status');

require __DIR__.'/auth.php';
