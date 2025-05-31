<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\PropertyController;

Route::get('/', [TopController::class, 'index']);
Route::get('/list/{area}', [ListController::class, 'show']);
Route::get('/property/{id}', [PropertyController::class, 'show']);