<?php

use App\Models\Banner;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Review;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    $banners = Banner::query()
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->latest()
        ->get();

    $reviews = Review::query()
        ->where('is_approved', true)
        ->latest()
        ->limit(10)
        ->get();

    return view('home', compact('banners', 'reviews'));
})->name('home');

// About Us
Route::get('/about', function () {
    return view('about');
})->name('about');

// Gallery (dynamic)
Route::get('/gallery', function () {
    $categories = GalleryCategory::query()
        ->with(['galleries' => fn ($q) => $q->latest()])
        ->has('galleries')
        ->orderBy('name')
        ->get();

    return view('gallery', compact('categories'));
})->name('gallery');

// Booking Form
Route::get('/booking', function () {
    return view('booking');
})->name('booking');

// Booking Form Submission
use App\Http\Controllers\BookingController;

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Add Review
Route::get('/add-review', function () {
    return view('add-review');
})->name('add-review');

// Reviews
Route::get('/reviews', function () {
    return view('reviews');
})->name('reviews');

// Contact Us
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
