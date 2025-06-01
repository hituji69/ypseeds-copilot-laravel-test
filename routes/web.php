<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', [TopController::class, 'index']);
Route::get('/list/{area}', [ListController::class, 'show']);
Route::get('/property/{id}', [PropertyController::class, 'show']);
Route::get('/inquiry/{property_id}', [InquiryController::class, 'show']);
Route::post('/inquiry/{property_id}', [InquiryController::class, 'store']);

// Authentication routes under dashboard
Route::middleware('guest')->prefix('dashboard')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Dashboard routes (require authentication)
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/properties', [DashboardController::class, 'properties'])->name('dashboard.properties');
    Route::get('/inquiries', [DashboardController::class, 'inquiries'])->name('dashboard.inquiries');
    Route::get('/users', [DashboardController::class, 'users'])->name('dashboard.users');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');
});