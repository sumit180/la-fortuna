<?php

use App\Models\Gallery;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('home');
})->name('home');

// About Us
Route::get('/about', function () {
    return view('about');
})->name('about');

// Gallery (dynamic)
Route::get('/gallery', function () {
    $galleries = Gallery::query()->latest()->get();

    return view('gallery', compact('galleries'));
})->name('gallery');

// Booking Form
Route::get('/booking', function () {
    return view('booking');
})->name('booking');

// Booking Form Submission
use App\Http\Controllers\BookingController;

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Reviews (not in navigation)
Route::get('/reviews', function () {
    return view('reviews');
})->name('reviews');

// Contact Us
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
