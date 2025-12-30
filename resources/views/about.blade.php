@extends('layouts.app')

@section('title', 'About Us - La Fortuna Banquet Hall')
@section('description', 'Learn about La Fortuna Banquet Hall, our history, values, and commitment to making your special events unforgettable.')

@section('content')
<!-- Page Header -->
<section class="hero" style="height: 60vh; min-height: 400px;">
    <div class="hero-slider">
        <div class="hero-slide active">
            <img src="{{ asset('galleries/img_695346c0bdee78.41239655.webp') }}" alt="About La Fortuna">
        </div>
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>About <span class="gold-text">La Fortuna</span></h1>
        <p>Creating Memorable Celebrations Since Years</p>
    </div>
</section>

<!-- Our Story Section -->
<section class="section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
            <div>
                <img src="{{ asset('galleries/img_695346c124ccb6.78549664.webp') }}" alt="La Fortuna Venue" style="border-radius: 15px; box-shadow: 0 10px 30px var(--shadow);">
            </div>
            <div>
                <h2 style="font-size: 42px; margin-bottom: 20px;">Our Story</h2>
                <p style="color: var(--gray); line-height: 1.8; margin-bottom: 20px;">
                    La Fortuna Banquet Hall was founded with a vision to provide the perfect setting for life's most important celebrations. Our name, meaning "The Fortune" in Italian, reflects our commitment to bringing good fortune and joy to every event we host.
                </p>
                <p style="color: var(--gray); line-height: 1.8; margin-bottom: 20px;">
                    Over the years, we have had the privilege of hosting countless weddings, birthday celebrations, corporate events, and special occasions. Each event is unique, and we take pride in our ability to transform our elegant space to match your vision perfectly.
                </p>
                <p style="color: var(--gray); line-height: 1.8; margin-bottom: 30px;">
                    Our team of dedicated professionals works tirelessly to ensure that every detail is perfect, from the initial planning stages to the final moments of your celebration. We believe that every event deserves to be extraordinary.
                </p>
                </div>
                 
        </div>
<div style="border: 3px solid var(--red); padding: 30px; border-radius: 15px; margin-bottom: 30px; background: rgba(191, 50, 36, 0.05);">
                    <p style="color: var(--gray); line-height: 1.8; margin: 0;">
                        Whether you're planning an intimate gathering or a grand celebration, La Fortuna Banquet Hall is here to make your dreams a reality. Our experienced event coordinators are here to help you create an unforgettable celebration tailored to your unique vision and needs. From elegant weddings to milestone birthday parties, corporate gatherings to family reunions, we provide the perfect backdrop for your special moments. Our attention to detail, commitment to excellence, and personalized service ensure that your event will be remembered for years to come.
                    </p>
                </div>
                <div style="text-align: center; padding: 30px 0;">
                    <a href="{{ route('booking') }}" class="btn btn-primary">Plan Your Event</a>
                </div>
           
    </div>
</section>

{{--<!-- Our Values Section -->
<section class="section" style="background: var(--light-gray);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Our Values</h2>
            <p class="section-subtitle">The principles that guide everything we do</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h3>Excellence</h3>
                <p>We strive for excellence in every aspect of our service, ensuring that your event exceeds expectations.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Integrity</h3>
                <p>Honesty and transparency are at the core of our business, building trust with every client we serve.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Passion</h3>
                <p>We are passionate about creating memorable experiences and celebrating life's special moments with you.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Innovation</h3>
                <p>We continuously evolve and innovate to provide the latest in event services and amenities.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Community</h3>
                <p>We are proud to be part of our community and contribute to celebrating its most joyous occasions.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <h3>Quality</h3>
                <p>Premium quality in our facilities, services, and cuisine is our unwavering commitment to you.</p>
            </div>
        </div>
    </div>
</section>--}}

<!-- Our Facilities Section -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Our Facilities</h2>
            <p class="section-subtitle">Everything you need for a perfect celebration</p>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
            <div style="background: var(--white); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px var(--shadow);">
                <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--gold-light), var(--gold)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                    <i class="fas fa-building" style="font-size: 28px; color: var(--white);"></i>
                </div>
                <h3 style="margin-bottom: 15px;">Main Banquet Hall</h3>
                <p style="color: var(--gray); line-height: 1.8;">Spacious main hall with capacity for up to 500 guests, featuring elegant chandeliers and customizable decor options.</p>
            </div>
            <div style="background: var(--white); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px var(--shadow);">
                <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--gold-light), var(--gold)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                    <i class="fas fa-utensils" style="font-size: 28px; color: var(--white);"></i>
                </div>
                <h3 style="margin-bottom: 15px;">Professional Kitchen</h3>
                <p style="color: var(--gray); line-height: 1.8;">State-of-the-art kitchen facilities with experienced culinary team to prepare exquisite dishes for your guests.</p>
            </div>
            <div style="background: var(--white); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px var(--shadow);">
                <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--gold-light), var(--gold)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                    <i class="fas fa-music" style="font-size: 28px; color: var(--white);"></i>
                </div>
                <h3 style="margin-bottom: 15px;">Audio & Lighting</h3>
                <p style="color: var(--gray); line-height: 1.8;">Advanced sound system and dynamic lighting to create the perfect atmosphere for any type of celebration.</p>
            </div>
            <div style="background: var(--white); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px var(--shadow);">
                <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--gold-light), var(--gold)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                    <i class="fas fa-wheelchair" style="font-size: 28px; color: var(--white);"></i>
                </div>
                <h3 style="margin-bottom: 15px;">Accessibility</h3>
                <p style="color: var(--gray); line-height: 1.8;">Fully accessible facilities ensuring comfort and convenience for all guests, including those with mobility needs.</p>
            </div>
            <div style="background: var(--white); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px var(--shadow);">
                <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--gold-light), var(--gold)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                    <i class="fas fa-parking" style="font-size: 28px; color: var(--white);"></i>
                </div>
                <h3 style="margin-bottom: 15px;">Parking Space</h3>
                <p style="color: var(--gray); line-height: 1.8;">Ample secure parking area with valet service available to ensure your guests' convenience.</p>
            </div>
            <div style="background: var(--white); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px var(--shadow);">
                <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--gold-light), var(--gold)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                    <i class="fas fa-couch" style="font-size: 28px; color: var(--white);"></i>
                </div>
                <h3 style="margin-bottom: 15px;">Lounge Area</h3>
                <p style="color: var(--gray); line-height: 1.8;">Comfortable lounge spaces for guests to relax and socialize in a more intimate setting.</p>
            </div>
        </div>
    </div>
</section>

{{--<!-- CTA Section -->
<section class="section" style="background: linear-gradient(135deg, var(--red), var(--red-dark)); color: var(--white); text-align: center;">
    <div class="container">
        <h2 style="color: var(--white); font-size: 42px; margin-bottom: 20px;">Experience La Fortuna</h2>
        <p style="font-size: 20px; margin-bottom: 40px;">Schedule a tour of our venue and let us help you plan your perfect event</p>
        <a href="{{ route('contact') }}" class="btn" style="background: var(--white); color: var(--red);">Schedule a Tour</a>
    </div>
</section>--}}
@endsection

@push('styles')
<style>
@media (max-width: 768px) {
    section div[style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
    }
}
</style>
@endpush
