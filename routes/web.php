<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TopController;

Route::get('/', [TopController::class, 'index']);
Route::get('/list/{area}', [ListController::class, 'show']);

Route::get('/property/{id}', function ($id) {
    return "物件詳細ページ（ID: {$id}）- 実装予定";
});