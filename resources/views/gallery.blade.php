@extends('layouts.app')

@section('title', 'Gallery - La Fortuna Banquet Hall')
@section('description', 'Browse our gallery showcasing beautiful events, weddings, and celebrations at La Fortuna Banquet Hall.')

@section('content')
<!-- Page Header -->
<section class="hero" style="height: 60vh; min-height: 400px;">
    <div class="hero-slider">
        <div class="hero-slide active">
            <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1920&q=80" alt="Gallery">
        </div>
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Our <span class="gold-text">Gallery</span></h1>
        <p>Glimpses of Beautiful Celebrations at La Fortuna</p>
    </div>
</section>

<!-- Dynamic Gallery Section -->
@if(isset($galleries) && $galleries->count())
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Our Gallery</h2>
            <p class="section-subtitle">Recent images from our events</p>
        </div>
        <div class="gallery-grid pswp-gallery" data-gallery="dynamic">
            @foreach($galleries as $item)
                <div class="gallery-item">
                    <a class="gallery-link" href="{{ asset('storage/' . $item->image) }}" data-pswp-width="1600" data-pswp-height="1067">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                        <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Gallery Section -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Weddings</h2>
            <p class="section-subtitle">Elegant wedding celebrations at La Fortuna</p>
        </div>
        <div class="gallery-grid pswp-gallery" data-gallery="weddings">
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1519167758481-83f29da8ee08?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1519167758481-83f29da8ee08?w=800&q=80" alt="Wedding ceremony">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1478146896981-b80fe463b330?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1478146896981-b80fe463b330?w=800&q=80" alt="Wedding decoration">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&q=80" alt="Wedding reception">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1522673607211-8eac45a87c89?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1522673607211-8eac45a87c89?w=800&q=80" alt="Wedding venue">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1519741497674-611481863552?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=800&q=80" alt="Wedding setup">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=800&q=80" alt="Wedding celebration">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section" style="background: var(--light-gray);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Birthday Celebrations</h2>
            <p class="section-subtitle">Memorable birthday parties at our venue</p>
        </div>
        <div class="gallery-grid pswp-gallery" data-gallery="birthdays">
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=800&q=80" alt="Birthday party">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=800&q=80" alt="Birthday decoration">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80" alt="Birthday setup">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?w=800&q=80" alt="Birthday celebration">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1513151233558-d860c5398176?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1513151233558-d860c5398176?w=800&q=80" alt="Birthday venue">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1464347744102-11db6282f854?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1464347744102-11db6282f854?w=800&q=80" alt="Birthday party">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Special Events & Parties</h2>
            <p class="section-subtitle">Various celebrations and corporate events</p>
        </div>
        <div class="gallery-grid pswp-gallery" data-gallery="events">
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&q=80" alt="Special event">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=800&q=80" alt="Corporate event">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1505236858219-8359eb29e329?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1505236858219-8359eb29e329?w=800&q=80" alt="Party venue">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=800&q=80" alt="Event celebration">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1504196606672-aef5c9cefc92?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1504196606672-aef5c9cefc92?w=800&q=80" alt="Party setup">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
            <div class="gallery-item">
                <a class="gallery-link" href="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=1600&q=80" data-pswp-width="1600" data-pswp-height="1067">
                    <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=800&q=80" alt="Event venue">
                    <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: linear-gradient(135deg, var(--gold), var(--gold-dark)); color: var(--white); text-align: center;">
    <div class="container">
        <h2 style="color: var(--white); font-size: 42px; margin-bottom: 20px;">Love What You See?</h2>
        <p style="font-size: 20px; margin-bottom: 40px;">Let's create beautiful memories together at La Fortuna</p>
        <a href="{{ route('booking') }}" class="btn btn-secondary">Book Your Event</a>
    </div>
</section>
@endsection
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/photoswipe@5/dist/photoswipe.css" />
@endpush

@push('scripts')
    <script type="module">
        import PhotoSwipeLightbox from 'https://unpkg.com/photoswipe@5/dist/photoswipe-lightbox.esm.js';
        const lightbox = new PhotoSwipeLightbox({
            gallery: '.pswp-gallery',
            children: 'a[data-pswp-width]',
            wheelToZoom: true,
            pswpModule: () => import('https://unpkg.com/photoswipe@5/dist/photoswipe.esm.js')
        });
        lightbox.init();
    </script>
@endpush
