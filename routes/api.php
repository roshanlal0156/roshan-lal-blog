<?php

use App\Commons\Constants;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

Route::get('/', [BlogController::class, 'get'])->name('home');
Route::post('/blog', [BlogController::class, 'post']);
Route::get('/blog/{slug}', [BlogController::class, 'getBySlug']);
Route::get('/login-view', [UserController::class, 'loginView'])->name('login-view');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/author/dashboard', [AuthorController::class, 'dashboard'])->name('author-dashboard')->middleware(['check-jwt', 'check-role:' . Constants::$AUTHOR]); 
Route::post('/author/create-new-blog', [BlogController::class, 'createNewBlog'])->name('create-new-blog')->middleware(['check-jwt', 'check-role:' . Constants::$AUTHOR]); 
Route::get('/blog/{slug}/edit', [BlogController::class, 'getEditView'])->name('edit-view')->middleware(['check-jwt', 'check-role:' . Constants::$AUTHOR]); 
Route::post('/blog/{slug}/update', [BlogController::class, 'updateBlog'])->name('update-blog')->middleware(['check-jwt', 'check-role:' . Constants::$AUTHOR]); 
Route::get('/blog/{slug}/preview', [BlogController::class, 'getPreview'])->name('preview')->middleware(['check-jwt', 'check-role:' . Constants::$AUTHOR]); 
