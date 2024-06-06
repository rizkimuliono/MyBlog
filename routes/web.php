<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

Route::get('/', [BlogController::class, 'index']);
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('post/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('category/{id}', [CategoryController::class, 'show'])->name('category.show');

Route::middleware('admin')->group(function () {
    Route::resource('admin/posts', PostController::class);
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('admin/menus', MenuController::class);
});

