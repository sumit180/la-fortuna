@extends('layouts.app')

@section('title', 'Contact Us - La Fortuna Banquet Hall')
@section('description', 'Get in touch with La Fortuna Banquet Hall. Contact us for inquiries, bookings, or to schedule a venue tour.')

@section('content')
<!-- Page Header -->
<section class="hero" style="height: 60vh; min-height: 400px;">
    <div class="hero-slider">
        <div class="hero-slide active">
            <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=1920&q=80" alt="Contact Us">
        </div>
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Get In <span class="gold-text">Touch</span></h1>
        <p>We're Here to Help Plan Your Perfect Event</p>
    </div>
</section>

<!-- Contact Section -->
<section class="section contact-section">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Info Column -->
            <div>
                <h2 style="font-size: 36px; margin-bottom: 30px;">Contact Information</h2>
                <p style="color: var(--gray); font-size: 18px; line-height: 1.8; margin-bottom: 40px;">
                    Have questions about our venue or services? We'd love to hear from you. Reach out to us using any of the methods below.
                </p>
                
                <div class="contact-info-card">
                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-item-content">
                            <h4>Our Location</h4>
                            <p>C-146, Mayapuri Rd<br>Mayapuri Industrial Area Phase II<br>Mayapuri, Delhi, 110064</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-item-content">
                            <h4>Phone Number</h4>
                            <p>+91 88600 05311</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-item-content">
                            <h4>Email Address</h4>
                            <p>General: info@lafortuna.com<br>Booking: booking@lafortuna.com</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-item-content">
                            <h4>Business Hours</h4>
                            <p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday - Sunday: 10:00 AM - 4:00 PM</p>
                        </div>
                    </div>
                </div>
                
                <div style="margin-top: 30px;">
                    <h3 style="margin-bottom: 20px;">Follow Us</h3>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Pinterest"><i class="fab fa-pinterest"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form Column -->
            <div class="form-card">
                <h2 style="margin-bottom: 30px;">Send Us a Message</h2>
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <select id="subject" name="subject" class="form-control" required>
                            <option value="">Select Subject</option>
                            <option value="general">General Inquiry</option>
                            <option value="booking">Booking Information</option>
                            <option value="pricing">Pricing & Packages</option>
                            <option value="tour">Schedule a Tour</option>
                            <option value="feedback">Feedback</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Your Message *</label>
                        <textarea id="message" name="message" class="form-control" rows="6" placeholder="Tell us how we can help you..." required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="section" style="padding: 0;">
    <div style="width: 100%; height: 450px; display: flex; align-items: center; justify-content: center;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3525.088267232195!2d77.11411107550037!3d28.62115857567097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d034dc0000007%3A0x8213e1c03e74826b!2sLa%20Fortuna!5e1!3m2!1sen!2sin!4v1765963000247!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<!-- FAQ Section -->
<section class="section" style="background: var(--light-gray);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle">Quick answers to common questions</p>
        </div>
        
        <div style="max-width: 900px; margin: 0 auto;">
            <div style="background: var(--white); padding: 30px; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 5px 20px var(--shadow);">
                <h4 style="margin-bottom: 15px; color: var(--dark);">What is the capacity of your venue?</h4>
                <p style="color: var(--gray); line-height: 1.8;">Our main banquet hall can comfortably accommodate up to 500 guests for seated events and up to 600 for standing receptions.</p>
            </div>
            
            <div style="background: var(--white); padding: 30px; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 5px 20px var(--shadow);">
                <h4 style="margin-bottom: 15px; color: var(--dark);">Do you provide catering services?</h4>
                <p style="color: var(--gray); line-height: 1.8;">Yes, we have an in-house catering team that offers a wide variety of menu options. We can also work with external caterers if you prefer.</p>
            </div>
            
            <div style="background: var(--white); padding: 30px; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 5px 20px var(--shadow);">
                <h4 style="margin-bottom: 15px; color: var(--dark);">How far in advance should I book?</h4>
                <p style="color: var(--gray); line-height: 1.8;">We recommend booking 6-12 months in advance for weddings and 3-6 months for other events to ensure availability of your preferred date.</p>
            </div>
            
            <div style="background: var(--white); padding: 30px; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 5px 20px var(--shadow);">
                <h4 style="margin-bottom: 15px; color: var(--dark);">Is parking available?</h4>
                <p style="color: var(--gray); line-height: 1.8;">Yes, we offer complimentary parking for all guests with ample space. Valet service is also available upon request.</p>
            </div>
            
            <div style="background: var(--white); padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px var(--shadow);">
                <h4 style="margin-bottom: 15px; color: var(--dark);">Can we schedule a tour of the venue?</h4>
                <p style="color: var(--gray); line-height: 1.8;">Absolutely! We encourage potential clients to tour our facility. Please contact us to schedule a convenient time.</p>
            </div>
        </div>
    </div>
</section>
@endsection
