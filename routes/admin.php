<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminLeadController;
use App\Http\Controllers\Admin\AdminProfileController;
use Illuminate\Support\Facades\Route;

// Admin authentication routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('/leads', [AdminLeadController::class, 'index'])->name('leads.index');

        // Galleries
        Route::get('/galleries', function () {
            return view('admin.galleries.index');
        })->name('galleries.index');

        // Password change
        Route::get('/password', [AdminProfileController::class, 'edit'])->name('password.edit');
        Route::post('/password', [AdminProfileController::class, 'update'])->name('password.update');
    });
});
