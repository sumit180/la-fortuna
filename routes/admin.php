<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminLeadController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

// Admin authentication routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Root admin route - redirect based on auth status
    Route::get('/', function () {
        if (auth('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login');
    });

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('/leads', [AdminLeadController::class, 'index'])->name('leads.index');

        // Galleries
        Route::get('/galleries', function () {
            return view('admin.galleries.index');
        })->name('galleries.index');

        // Home Banners
        Route::get('/banners', function () {
            return view('admin.banners.index');
        })->name('banners.index');

        // Gallery Categories
        Route::get('/gallery-categories', function () {
            return view('admin.categories.index');
        })->name('gallery-categories.index');

        // Reviews
        Route::get('/reviews', function () {
            return view('admin.reviews.index');
        })->name('reviews.index');

        // Password change
        Route::get('/password', [AdminProfileController::class, 'edit'])->name('password.edit');
        Route::post('/password', [AdminProfileController::class, 'update'])->name('password.update');
    });
});
