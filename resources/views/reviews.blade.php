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
        <div style="max-width: 800px; margin: 0 auto;">
            <div class="form-card">
                <div style="text-align: center; margin-bottom: 40px;">
                    <h2 style="font-size: 36px; margin-bottom: 15px;">Leave a Review</h2>
                    <p style="color: var(--gray); font-size: 18px;">Your feedback helps us improve and helps others make informed decisions</p>
                </div>
                
                <form id="reviewForm">
                    <div class="form-group">
                        <label for="name">Your Name *</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="event_type">Type of Event Attended</label>
                        <select id="event_type" name="event_type" class="form-control">
                            <option value="">Select Event Type</option>
                            <option value="wedding">Wedding</option>
                            <option value="birthday">Birthday Party</option>
                            <option value="anniversary">Anniversary</option>
                            <option value="corporate">Corporate Event</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Your Rating *</label>
                        <div style="display: flex; gap: 10px; font-size: 32px; margin-top: 10px;">
                            <input type="radio" name="rating" value="5" id="star5" style="display: none;" required>
                            <label for="star5" class="star-label" style="cursor: pointer; color: #ddd;">★</label>
                            
                            <input type="radio" name="rating" value="4" id="star4" style="display: none;">
                            <label for="star4" class="star-label" style="cursor: pointer; color: #ddd;">★</label>
                            
                            <input type="radio" name="rating" value="3" id="star3" style="display: none;">
                            <label for="star3" class="star-label" style="cursor: pointer; color: #ddd;">★</label>
                            
                            <input type="radio" name="rating" value="2" id="star2" style="display: none;">
                            <label for="star2" class="star-label" style="cursor: pointer; color: #ddd;">★</label>
                            
                            <input type="radio" name="rating" value="1" id="star1" style="display: none;">
                            <label for="star1" class="star-label" style="cursor: pointer; color: #ddd;">★</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="review_title">Review Title *</label>
                        <input type="text" id="review_title" name="review_title" class="form-control" placeholder="Sum up your experience" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Your Review *</label>
                        <textarea id="message" name="message" class="form-control" rows="6" placeholder="Tell us about your experience at La Fortuna..." required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                            <input type="checkbox" name="consent" required>
                            <span>I consent to La Fortuna using my review on their website and marketing materials</span>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Recent Reviews Section -->
<section class="section testimonials">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Recent Reviews</h2>
            <p class="section-subtitle">See what others are saying about La Fortuna</p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
            <div class="testimonial-card">
                <div style="text-align: left; margin-bottom: 20px;">
                    <div style="color: var(--gold); font-size: 20px; margin-bottom: 10px;">
                        ★★★★★
                    </div>
                    <h4 style="margin-bottom: 10px;">Perfect Wedding Venue!</h4>
                </div>
                <p class="testimonial-text" style="text-align: left;">"La Fortuna exceeded all our expectations for our wedding. The venue was stunning, the staff was incredible, and everything was perfect. Highly recommend!"</p>
                <div class="testimonial-author" style="justify-content: flex-start;">
                    <div class="author-avatar">MJ</div>
                    <div class="author-info" style="text-align: left;">
                        <h4>Maria & John</h4>
                        <p style="color: var(--gray); font-size: 14px;">Wedding - June 2024</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div style="text-align: left; margin-bottom: 20px;">
                    <div style="color: var(--gold); font-size: 20px; margin-bottom: 10px;">
                        ★★★★★
                    </div>
                    <h4 style="margin-bottom: 10px;">Amazing Birthday Party</h4>
                </div>
                <p class="testimonial-text" style="text-align: left;">"We celebrated my mother's 60th birthday at La Fortuna and it was absolutely wonderful. The food was delicious and the service was impeccable."</p>
                <div class="testimonial-author" style="justify-content: flex-start;">
                    <div class="author-avatar">SR</div>
                    <div class="author-info" style="text-align: left;">
                        <h4>Sarah Rodriguez</h4>
                        <p style="color: var(--gray); font-size: 14px;">Birthday - May 2024</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div style="text-align: left; margin-bottom: 20px;">
                    <div style="color: var(--gold); font-size: 20px; margin-bottom: 10px;">
                        ★★★★★
                    </div>
                    <h4 style="margin-bottom: 10px;">Excellent Service</h4>
                </div>
                <p class="testimonial-text" style="text-align: left;">"From planning to execution, the team at La Fortuna was professional and attentive. Our corporate event was a huge success thanks to them!"</p>
                <div class="testimonial-author" style="justify-content: flex-start;">
                    <div class="author-avatar">DT</div>
                    <div class="author-info" style="text-align: left;">
                        <h4>David Thompson</h4>
                        <p style="color: var(--gray); font-size: 14px;">Corporate Event - April 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.star-label:hover,
.star-label:hover ~ .star-label,
input[type="radio"]:checked ~ label.star-label {
    color: var(--gold) !important;
}
</style>
@endpush

@push('scripts')
<script>
// Star rating interaction
document.querySelectorAll('.star-label').forEach((label, index, labels) => {
    label.addEventListener('click', function() {
        labels.forEach(l => l.style.color = '#ddd');
        for(let i = labels.length - 1; i >= index; i--) {
            labels[i].style.color = 'var(--gold)';
        }
    });
});
</script>
@endpush
