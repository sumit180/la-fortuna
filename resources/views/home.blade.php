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
<section class="stats" style="padding: 0 !important;">
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

<!-- About Us Section -->
<section class="section about-section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 80px; align-items: center;">
            <!-- Image Column -->
            <div>
                <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=600&q=80" alt="La Fortuna Banquet Hall" style="width: 100%; height: 600px; object-fit: cover; border-radius: 12px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);">
            </div>
            
            <!-- Text Column -->
            <div>
                <h2 class="section-title" style="text-align: left; margin-bottom: 20px;">About La Fortuna</h2>
                <p style="color: var(--gray); font-size: 18px; line-height: 1.8; margin-bottom: 20px;">
                    La Fortuna Banquet Hall stands as a beacon of elegance and sophistication in the world of event venues. With over a decade of experience, we have established ourselves as the premier destination for celebrations that matter.
                </p>
                <p style="color: var(--gray); font-size: 18px; line-height: 1.8; margin-bottom: 20px;">
                    Our state-of-the-art facility, combined with our dedicated team of professionals, ensures that every event hosted at La Fortuna is nothing short of spectacular. From intimate gatherings to grand celebrations, we transform visions into unforgettable realities.
                </p>
                <p style="color: var(--gray); font-size: 18px; line-height: 1.8; margin-bottom: 30px;">
                    We pride ourselves on our commitment to excellence, attention to detail, and unwavering dedication to making your special day truly memorable. Your celebration deserves nothing less than La Fortuna.
                </p>
                
                <div style="display: flex; gap: 30px; margin-top: 30px;">
                    <div>
                        <h4 style="color: var(--gold); font-size: 24px; font-weight: 700; margin-bottom: 5px;">1000+</h4>
                        <p style="color: var(--gray);">Events Hosted</p>
                    </div>
                    <div>
                        <h4 style="color: var(--gold); font-size: 24px; font-weight: 700; margin-bottom: 5px;">15+</h4>
                        <p style="color: var(--gray);">Years Experience</p>
                    </div>
                    <div>
                        <h4 style="color: var(--gold); font-size: 24px; font-weight: 700; margin-bottom: 5px;">100%</h4>
                        <p style="color: var(--gray);">Satisfied Clients</p>
                    </div>
                </div>
                
                <a href="{{ route('about') }}" class="btn btn-primary" style="margin-top: 30px;">Learn More About Us</a>
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
            @if(isset($galleryPreviews) && $galleryPreviews->count())
                @foreach($galleryPreviews as $item)
                    <div class="gallery-item">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title ?? ($item->category->name ?? 'Gallery Image') }}">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                @endforeach
            @else
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
            @endif
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
        @if(isset($reviews) && $reviews->count() > 0)
            <div class="testimonials-slider-wrapper" style="position: relative; max-width: 900px; margin: 0 auto;">
                <button class="slider-btn slider-prev" style="position: absolute; left: -50px; top: 50%; transform: translateY(-50%); background: var(--gold); color: var(--white); border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; font-size: 18px; z-index: 10; transition: all 0.3s;">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="testimonials-slider">
                    @foreach($reviews as $review)
                        <div class="testimonial-card" style="display: {{ $loop->first ? 'block' : 'none' }};">
                            <p class="testimonial-text">"{{ $review->message }}"</p>
                            <div class="testimonial-author">
                                <div class="author-avatar">{{ substr($review->name, 0, 1) }}{{ substr(explode(' ', $review->name)[1] ?? '', 0, 1) }}</div>
                                <div class="author-info">
                                    <h4>{{ $review->name }}</h4>
                                    <div class="author-rating">
                                        @for($i = 0; $i < $review->rating; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                        @for($i = $review->rating; $i < 5; $i++)
                                            <i class="far fa-star"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="slider-btn slider-next" style="position: absolute; right: -50px; top: 50%; transform: translateY(-50%); background: var(--gold); color: var(--white); border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; font-size: 18px; z-index: 10; transition: all 0.3s;">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        @else
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
        @endif
    </div>
</section>

@push('styles')
<style>
.slider-btn:hover {
    background: var(--gold-dark) !important;
    transform: translateY(-50%) scale(1.1);
}
.slider-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}
@media (max-width: 768px) {
    .about-section {
        display: block !important;
    }
    .about-section > div {
        grid-template-columns: 1fr !important;
        gap: 30px !important;
    }
    .slider-btn {
        display: none !important;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const testimonials = document.querySelectorAll('.testimonial-card');
    const prevBtn = document.querySelector('.slider-prev');
    const nextBtn = document.querySelector('.slider-next');
    let currentIndex = 0;

    if (testimonials.length > 1 && prevBtn && nextBtn) {
        function showTestimonial(index) {
            testimonials.forEach((card, i) => {
                card.style.display = i === index ? 'block' : 'none';
            });
            prevBtn.disabled = index === 0;
            nextBtn.disabled = index === testimonials.length - 1;
        }

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                showTestimonial(currentIndex);
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentIndex < testimonials.length - 1) {
                currentIndex++;
                showTestimonial(currentIndex);
            }
        });

        showTestimonial(currentIndex);
    }
});
</script>
@endpush

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
