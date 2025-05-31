<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\InquiryController;

Route::get('/', [TopController::class, 'index']);
Route::get('/list/{area}', [ListController::class, 'show']);
Route::get('/property/{id}', [PropertyController::class, 'show']);
Route::get('/inquiry/{property_id}', [InquiryController::class, 'show']);
Route::post('/inquiry/{property_id}', [InquiryController::class, 'store']);