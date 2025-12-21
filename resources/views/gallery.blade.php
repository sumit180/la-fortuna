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

@if(isset($categories) && $categories->count())
    @foreach($categories as $index => $category)
        @php
            $useAltBackground = $index % 2 === 0;
        @endphp
        <section class="section" style="background: {{ $useAltBackground ? 'var(--light-gray)' : 'var(--white)' }};">
            <div class="container">
                <div class="section-header" style="text-align:center; margin-bottom:24px;">
                    <h2 class="section-title" style="font-size:32px;">{{ $category->name }}</h2>
                    @if($category->short_description)
                        <p class="section-subtitle" style="max-width:720px; margin: 0 auto;">{{ $category->short_description }}</p>
                    @endif
                </div>
                <div class="gallery-grid pswp-gallery" data-gallery="category-{{ $category->id }}">
                    @foreach($category->galleries as $item)
                        <div class="gallery-item">
                            <a class="gallery-link" href="{{ asset('storage/' . $item->image) }}" data-pswp-width="1600" data-pswp-height="1067">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $category->name }}" loading="lazy">
                                <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach
@endif

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
