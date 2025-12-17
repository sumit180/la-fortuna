@extends('layouts.app')

@section('title', 'Book Your Event - La Fortuna Banquet Hall')
@section('description', 'Book your wedding, birthday, or special event at La Fortuna Banquet Hall. Fill out our booking form and we will contact you shortly.')

@section('content')
<!-- Page Header -->
<section class="hero" style="height: 60vh; min-height: 400px;">
    <div class="hero-slider">
        <div class="hero-slide active">
            <img src="https://images.unsplash.com/photo-1519167758481-83f29da8ee08?w=1920&q=80" alt="Book your event">
        </div>
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Book <span class="gold-text">Your Event</span></h1>
        <p>Let's Start Planning Your Perfect Celebration</p>
    </div>
</section>

<!-- Booking Form Section -->
<section class="section contact-section">
    <div class="container">
        <div class="contact-grid">
            <!-- Info Column -->
            <div>
                <div class="contact-info-card">
                    <h3 style="margin-bottom: 20px; color: var(--dark);">Why Book With Us?</h3>
                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="contact-item-content">
                            <h4>Quick Response</h4>
                            <p>We respond to all booking inquiries within 24 hours</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="contact-item-content">
                            <h4>Flexible Scheduling</h4>
                            <p>Available dates throughout the year with flexible timing</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="contact-item-content">
                            <h4>Customizable Packages</h4>
                            <p>Tailored solutions to match your budget and requirements</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-info-card">
                    <h3 style="margin-bottom: 20px; color: var(--dark);">Need Help?</h3>
                    <p style="color: var(--gray); margin-bottom: 20px;">Our event coordinators are here to assist you with any questions about booking your event.</p>
                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-item-content">
                            <h4>Call Us</h4>
                            <p>+1 (123) 456-7890</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-item-content">
                            <h4>Email Us</h4>
                            <p>booking@lafortuna.com</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Form Column -->
            <div class="form-card">
                <h2 style="margin-bottom: 30px;">Event Booking Form</h2>
                <form id="bookingForm">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="event_type">Event Type *</label>
                        <select id="event_type" name="event_type" class="form-control" required>
                            <option value="">Select Event Type</option>
                            <option value="wedding">Wedding</option>
                            <option value="birthday">Birthday Party</option>
                            <option value="anniversary">Anniversary</option>
                            <option value="corporate">Corporate Event</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="event_date">Preferred Event Date *</label>
                        <input type="date" id="event_date" name="event_date" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="guests">Expected Number of Guests *</label>
                        <input type="number" id="guests" name="guests" class="form-control" min="1" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="budget">Estimated Budget</label>
                        <select id="budget" name="budget" class="form-control">
                            <option value="">Select Budget Range</option>
                            <option value="budget1">$5,000 - $10,000</option>
                            <option value="budget2">$10,000 - $20,000</option>
                            <option value="budget3">$20,000 - $30,000</option>
                            <option value="budget4">$30,000+</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Additional Details</label>
                        <textarea id="message" name="message" class="form-control" rows="5" placeholder="Tell us more about your event..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Booking Request</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- What Happens Next Section -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">What Happens Next?</h2>
            <p class="section-subtitle">Our simple booking process</p>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px;">
            <div style="text-align: center;">
                <div style="width: 80px; height: 80px; margin: 0 auto 20px; background: linear-gradient(135deg, var(--gold), var(--gold-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; color: var(--white); font-weight: 700;">1</div>
                <h3 style="margin-bottom: 15px;">Submit Form</h3>
                <p style="color: var(--gray);">Fill out the booking form with your event details</p>
            </div>
            <div style="text-align: center;">
                <div style="width: 80px; height: 80px; margin: 0 auto 20px; background: linear-gradient(135deg, var(--gold), var(--gold-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; color: var(--white); font-weight: 700;">2</div>
                <h3 style="margin-bottom: 15px;">We Contact You</h3>
                <p style="color: var(--gray);">Our team reaches out within 24 hours</p>
            </div>
            <div style="text-align: center;">
                <div style="width: 80px; height: 80px; margin: 0 auto 20px; background: linear-gradient(135deg, var(--gold), var(--gold-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; color: var(--white); font-weight: 700;">3</div>
                <h3 style="margin-bottom: 15px;">Venue Tour</h3>
                <p style="color: var(--gray);">Schedule a visit to see our beautiful venue</p>
            </div>
            <div style="text-align: center;">
                <div style="width: 80px; height: 80px; margin: 0 auto 20px; background: linear-gradient(135deg, var(--gold), var(--gold-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; color: var(--white); font-weight: 700;">4</div>
                <h3 style="margin-bottom: 15px;">Confirm Booking</h3>
                <p style="color: var(--gray);">Finalize details and secure your date</p>
            </div>
        </div>
    </div>
</section>
@endsection
