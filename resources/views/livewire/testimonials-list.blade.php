<!-- Testimonials Section -->
<section class="section testimonials">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">What Our Clients Say</h2>
            <p class="section-subtitle">Real experiences from our satisfied customers</p>
        </div>
        @if($reviews->count() > 0)
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

        showTestimonial(0);

        prevBtn.addEventListener('click', function() {
            if (currentIndex > 0) {
                currentIndex--;
                showTestimonial(currentIndex);
            }
        });

        nextBtn.addEventListener('click', function() {
            if (currentIndex < testimonials.length - 1) {
                currentIndex++;
                showTestimonial(currentIndex);
            }
        });
    }
});
</script>
@endpush
