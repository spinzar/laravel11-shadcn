<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\UserDashboardController;
use App\Http\Controllers\Dashboard\ManagerDashboardController;
use App\Http\Controllers\Dashboard\GuestDashboardController;

// Admin Dashboard Route
Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

// User Dashboard Route
Route::middleware(['auth', 'role:user'])->get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

// Manager Dashboard Route
Route::middleware(['auth', 'role:manager'])->get('/manager/dashboard', [ManagerDashboardController::class, 'index'])->name('manager.dashboard');

// Guest Dashboard Route
Route::get('/guest/dashboard', [GuestDashboardController::class, 'index'])->name('guest.dashboard');
