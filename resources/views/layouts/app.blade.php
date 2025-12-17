<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'La Fortuna Banquet Hall - Elegant Event Venue')</title>
    <meta name="description" content="@yield('description', 'La Fortuna Banquet Hall - Premier event venue for weddings, birthdays, and special celebrations')">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <div class="nav-wrapper">
                <a href="{{ route('home') }}" class="logo">
                    <span class="logo-text">La Fortuna</span>
                    <span class="logo-subtitle">Banquet Hall</span>
                </a>
                
                <button class="mobile-toggle" id="mobileToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                
                <ul class="nav-menu" id="navMenu">
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
                    <li><a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a></li>
                    <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                    <li><a href="{{ route('booking') }}" class="btn-nav">Book Now</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <h3>La Fortuna</h3>
                    <p>Creating unforgettable moments for your special celebrations. Experience elegance and sophistication at its finest.</p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Pinterest"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('booking') }}">Book Event</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#">Weddings</a></li>
                        <li><a href="#">Birthday Parties</a></li>
                        <li><a href="#">Corporate Events</a></li>
                        <li><a href="#">Anniversary Celebrations</a></li>
                        <li><a href="#">Special Occasions</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Contact Info</h4>
                    <ul class="contact-info">
                        <li><i class="fas fa-map-marker-alt"></i> C-146, Mayapuri Rd, Mayapuri Industrial Area Phase II, Mayapuri, Delhi, 110064</li>
                        <li><i class="fas fa-phone"></i> +91 88600 05311</li>
                        <li><i class="fas fa-envelope"></i> info@lafortuna.com</li>
                        <li><i class="fas fa-clock"></i> Mon-Sun: 9AM - 11PM</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} La Fortuna Banquet Hall. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    @stack('scripts')
</body>
</html>
