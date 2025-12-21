@extends('layouts.app')

@section('title', 'Customer Reviews - La Fortuna Banquet Hall')
@section('description', 'Read what our customers say about their experiences at La Fortuna Banquet Hall.')

@section('content')
<!-- Page Header -->
<section class="hero" style="height: 60vh; min-height: 400px;">
    <div class="hero-slider">
        <div class="hero-slide active">
            <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1920&q=80" alt="Customer Reviews">
        </div>
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Customer <span class="gold-text">Reviews</span></h1>
        <p>See What Our Clients Are Saying</p>
    </div>
</section>

<!-- Reviews Section -->
<section class="section testimonials">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Our valuable Reviews</h2>
            <p class="section-subtitle">Real experiences from our valued customers</p>
        </div>

        <livewire:reviews-list />

        <div style="text-align: center; margin-top: 60px; padding: 40px; background: var(--light-gray); border-radius: 12px;">
            <h3 style="font-size: 28px; margin-bottom: 15px;">Share Your Experience</h3>
            <p style="color: var(--gray); font-size: 16px; margin-bottom: 25px;">
                Have you celebrated an event at La Fortuna? We'd love to hear about it!
            </p>
            <a href="{{ route('add-review') }}" class="btn btn-primary" style="padding: 12px 40px; font-size: 16px;">
                Leave a Review
            </a>
        </div>
    </div>
</section>
@endsection
