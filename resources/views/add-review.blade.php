@extends('layouts.app')

@section('title', 'Leave a Review - La Fortuna Banquet Hall')
@section('description', 'Share your experience at La Fortuna Banquet Hall. Your feedback helps us serve you better.')

@section('content')
<!-- Page Header -->
<section class="hero" style="height: 60vh; min-height: 400px;">
    <div class="hero-slider">
        <div class="hero-slide active">
            <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1920&q=80" alt="Reviews">
        </div>
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Share Your <span class="gold-text">Experience</span></h1>
        <p>We Value Your Feedback</p>
    </div>
</section>

<!-- Review Form Section -->
<section class="section">
    <div class="container">
        <livewire:add-review-form />
    </div>
</section>

<!-- Recent Reviews Section -->
<section class="section testimonials">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Approved Reviews</h2>
            <p class="section-subtitle">See what others are saying about La Fortuna</p>
        </div>

        @php
            $approvedReviews = \App\Models\Review::where('is_approved', true)
                ->latest()
                ->limit(3)
                ->get();
        @endphp

        @if($approvedReviews->count() > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
                @foreach($approvedReviews as $review)
                    <div class="testimonial-card">
                        <div style="text-align: left; margin-bottom: 20px;">
                            <div style="color: var(--gold); font-size: 20px; margin-bottom: 10px;">
                                @for($i = 0; $i < $review->rating; $i++)
                                    ★
                                @endfor
                            </div>
                        </div>
                        <p class="testimonial-text" style="text-align: left;">{{ Str::limit($review->message, 200) }}</p>
                        <div class="testimonial-author" style="justify-content: flex-start;">
                            <div class="author-avatar">{{ substr($review->name, 0, 1) }}{{ substr(explode(' ', $review->name)[1] ?? '', 0, 1) }}</div>
                            <div class="author-info" style="text-align: left;">
                                <h4>{{ $review->name }}</h4>
                                <p style="color: var(--gray); font-size: 14px;">{{ $review->created_at->format('F Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 40px; color: var(--gray);">
                <p style="font-size: 18px;">No approved reviews yet. Be the first to share your experience!</p>
            </div>
        @endif
    </div>
</section>
@endsection
