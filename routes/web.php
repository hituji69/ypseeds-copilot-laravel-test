<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\Dashboards\TopController as DashboardTopController;
use App\Http\Controllers\Dashboards\PropertiesController;
use App\Http\Controllers\Dashboards\InquiriesController;
use App\Http\Controllers\Dashboards\UsersController;
use App\Http\Controllers\Dashboards\SettingsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\DashboardAuthController;

Route::get('/', [TopController::class, 'index']);
Route::get('/list/{area}', [ListController::class, 'show']);
Route::get('/property/{id}', [PropertyController::class, 'show']);
Route::get('/inquiry/{property_id}', [InquiryController::class, 'show']);
Route::post('/inquiry/{property_id}', [InquiryController::class, 'store']);

// Authentication routes under dashboard
Route::middleware('guest')->prefix('dashboard')->group(function () {
    Route::get('login', [DashboardAuthController::class, 'create'])->name('dashboard.login');
    Route::post('login', [DashboardAuthController::class, 'store']);
});

// Keep existing auth routes for backward compatibility
Route::middleware('guest')->prefix('dashboard')->group(function () {
    Route::get('auth/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('auth/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Dashboard logout route
Route::post('/dashboard/logout', [DashboardAuthController::class, 'destroy'])->name('dashboard.logout');

// Dashboard routes (require authentication)
Route::middleware('dashboard.auth')->prefix('dashboard')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('/', [DashboardTopController::class, 'index'])->name('dashboard');
    Route::get('/properties', [PropertiesController::class, 'index'])->name('dashboard.properties');
    Route::get('/inquiries', [InquiriesController::class, 'index'])->name('dashboard.inquiries');
    Route::get('/users', [UsersController::class, 'index'])->name('dashboard.users');
    Route::get('/settings', [SettingsController::class, 'index'])->name('dashboard.settings');
});