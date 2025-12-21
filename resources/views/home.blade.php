@extends('layouts.app')

@section('title', 'La Fortuna Banquet Hall - Premier Event Venue for Weddings & Celebrations')
@section('description', 'La Fortuna Banquet Hall offers the perfect venue for weddings, birthdays, and special celebrations. Experience luxury and elegance for your memorable occasions.')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-slider">
        @if(isset($banners) && $banners->count())
            @foreach($banners as $banner)
                <div class="hero-slide {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title ?? 'Banner' }}">
                </div>
            @endforeach
        @else
            <div class="hero-slide active">
                <img src="https://images.unsplash.com/photo-1519167758481-83f29da8ee08?w=1920&q=80" alt="Elegant wedding venue">
            </div>
            <div class="hero-slide">
                <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=1920&q=80" alt="Beautiful banquet hall">
            </div>
            <div class="hero-slide">
                <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1920&q=80" alt="Celebration venue">
            </div>
        @endif
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Welcome to <span class="gold-text">La Fortuna</span></h1>
        <p>Where Every Celebration Becomes an Unforgettable Memory</p>
        <div class="hero-buttons">
            <a href="{{ route('booking') }}" class="btn btn-primary">Book Your Event</a>
            <a href="{{ route('gallery') }}" class="btn btn-outline">View Gallery</a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="stat-number" data-target="500">0+</div>
                <div class="stat-label">Weddings Hosted</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-birthday-cake"></i>
                </div>
                <div class="stat-number" data-target="350">0+</div>
                <div class="stat-label">Birthday Celebrations</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-glass-cheers"></i>
                </div>
                <div class="stat-number" data-target="800">0+</div>
                <div class="stat-label">Successful Parties</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-smile"></i>
                </div>
                <div class="stat-number" data-target="1500">0+</div>
                <div class="stat-label">Happy Clients</div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Why Choose La Fortuna</h2>
            <p class="section-subtitle">Discover what makes us the perfect choice for your special occasion</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3>Elegant Venue</h3>
                <p>Our stunning banquet hall features sophisticated decor and flexible spaces that can be customized to match your vision perfectly.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <h3>Exquisite Catering</h3>
                <p>Delight your guests with our gourmet cuisine prepared by expert chefs, featuring diverse menus for every taste and preference.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Professional Staff</h3>
                <p>Our experienced team ensures every detail is perfect, providing exceptional service from planning to execution of your event.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>State-of-the-Art Lighting</h3>
                <p>Create the perfect ambiance with our advanced lighting systems and sound equipment for an unforgettable atmosphere.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-parking"></i>
                </div>
                <h3>Ample Parking</h3>
                <p>Convenient parking facilities ensure your guests arrive stress-free with plenty of secure parking space available.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <h3>Competitive Pricing</h3>
                <p>Enjoy premium quality services and amenities at competitive rates with flexible packages tailored to your budget.</p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Preview Section -->
<section class="section" style="background: var(--light-gray);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Our Gallery</h2>
            <p class="section-subtitle">Take a glimpse at our beautiful venue and past celebrations</p>
        </div>
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1478146896981-b80fe463b330?w=800&q=80" alt="Wedding decoration">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1519167758481-83f29da8ee08?w=800&q=80" alt="Banquet setup">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&q=80" alt="Reception hall">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&q=80" alt="Celebration">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=800&q=80" alt="Event venue">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=800&q=80" alt="Party setup">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ route('gallery') }}" class="btn btn-primary">View Full Gallery</a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section testimonials">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">What Our Clients Say</h2>
            <p class="section-subtitle">Real experiences from our satisfied customers</p>
        </div>
        <div class="testimonials-slider">
            <div class="testimonial-card">
                <p class="testimonial-text">"La Fortuna made our wedding day absolutely perfect! The venue was stunning, the staff was professional and attentive, and every detail was executed flawlessly. Our guests are still talking about how amazing everything was!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">MJ</div>
                    <div class="author-info">
                        <h4>Maria & John</h4>
                        <div class="author-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: linear-gradient(135deg, var(--gold), var(--gold-dark)); color: var(--white); text-align: center;">
    <div class="container">
        <h2 style="color: var(--white); font-size: 42px; margin-bottom: 20px;">Ready to Plan Your Perfect Event?</h2>
        <p style="font-size: 20px; margin-bottom: 40px;">Let us help you create unforgettable memories at La Fortuna Banquet Hall</p>
        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('booking') }}" class="btn btn-secondary">Book Now</a>
            <a href="{{ route('contact') }}" class="btn" style="background: var(--white); color: var(--gold);">Contact Us</a>
        </div>
    </div>
</section>
@endsection
