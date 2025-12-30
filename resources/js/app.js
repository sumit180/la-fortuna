// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileToggle = document.getElementById('mobileToggle');
    const navMenu = document.getElementById('navMenu');
    
    if (mobileToggle) {
        mobileToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }
    
    // Close mobile menu when clicking on a link
    const navLinks = document.querySelectorAll('.nav-menu a');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navMenu.classList.remove('active');
        });
    });
});

// Navbar Scroll Effect
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    const topHeader = document.querySelector('.top-header');
    if (navbar) {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
            // Hide top header on scroll, keep navbar at top
            if (topHeader) {
                topHeader.style.transform = 'translateY(-100%)';
            }
            navbar.style.top = '0';
        } else {
            navbar.classList.remove('scrolled');
            // Show top header when at top
            if (topHeader) {
                topHeader.style.transform = 'translateY(0)';
            }
            navbar.style.top = '50px';
        }
    }
});

// Hero Slider
let currentSlide = 0;
const slides = document.querySelectorAll('.hero-slide');

function showSlide(n) {
    if (slides.length > 0) {
        slides.forEach(slide => slide.classList.remove('active'));
        currentSlide = (n + slides.length) % slides.length;
        slides[currentSlide].classList.add('active');
    }
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

if (slides.length > 0) {
    showSlide(0);
    setInterval(nextSlide, 5000);
}

// Counter Animation
function animateCounter(element, target, duration = 2000) {
    let start = 0;
    const increment = target / (duration / 16);
    
    const timer = setInterval(() => {
        start += increment;
        if (start >= target) {
            element.textContent = target + '+';
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(start) + '+';
        }
    }, 16);
}

// Trigger counter animation when in viewport
const observerOptions = {
    threshold: 0.5
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counters = entry.target.querySelectorAll('.stat-number');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                animateCounter(counter, target);
            });
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

const statsSection = document.querySelector('.stats');
if (statsSection) {
    observer.observe(statsSection);
}

// Scroll to Top Button
const scrollTopBtn = document.getElementById('scrollTop');

window.addEventListener('scroll', function() {
    if (scrollTopBtn) {
        if (window.scrollY > 300) {
            scrollTopBtn.classList.add('visible');
        } else {
            scrollTopBtn.classList.remove('visible');
        }
    }
});

if (scrollTopBtn) {
    scrollTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// Form Submission
const contactForm = document.getElementById('contactForm');
const bookingForm = document.getElementById('bookingForm');
const reviewForm = document.getElementById('reviewForm');

function handleFormSubmit(form, successMessage) {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(form);
        
        // Show success message (you can replace this with actual AJAX submission)
        alert(successMessage);
        form.reset();
    });
}

if (contactForm) {
    handleFormSubmit(contactForm, 'Thank you for contacting us! We will get back to you soon.');
}

if (bookingForm) {
    handleFormSubmit(bookingForm, 'Your booking request has been submitted successfully! We will contact you shortly.');
}

if (reviewForm) {
    handleFormSubmit(reviewForm, 'Thank you for your review!');
}

// Gallery Lightbox: handled by PhotoSwipe in gallery.blade.php
// Intentionally no default click handler here to avoid opening new tabs.