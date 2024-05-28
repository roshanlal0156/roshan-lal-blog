<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'get']);
Route::post('/blog', [BlogController::class, 'post']);
Route::get('/blog/{slug}', [BlogController::class, 'getBySlug']);
