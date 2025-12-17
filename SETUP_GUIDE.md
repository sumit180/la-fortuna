# La Fortuna Banquet Hall Website - Setup & Deployment Guide

## 🎉 Project Overview

This is a fully responsive, modern website for La Fortuna Banquet Hall built with **Laravel 11** and **Vite**. The website features an elegant golden, white, and red color scheme perfect for a premium banquet venue.

## 📋 Project Structure

### Created Files & Directories:

```
resources/
├── css/
│   └── app.css                          # Complete custom CSS (1000+ lines)
│
├── js/
│   └── app.js                          # Interactive JavaScript features
│
└── views/
    ├── layouts/
    │   └── app.blade.php                # Master layout template with navigation & footer
    ├── home.blade.php                   # Homepage with hero, stats, features, gallery preview
    ├── about.blade.php                  # About Us page with story, values, facilities
    ├── gallery.blade.php                # Gallery with weddings, birthdays, special events
    ├── booking.blade.php                # Event booking form with lead capture
    ├── reviews.blade.php                # Customer reviews page with star rating
    └── contact.blade.php                # Contact form with FAQ and business info

routes/
└── web.php                              # Updated with all page routes
```

## 🎨 Design & Color Scheme

| Element | Color | Hex Code |
|---------|-------|----------|
| Primary (Gold) | Gradient Golden | #D4AF37 |
| Secondary (Red) | Premium Red | #C41E3A |
| Accent (White) | Pure White | #FFFFFF |
| Background | Off-White | #F8F8F8 |
| Text | Dark | #1a1a1a |

## ✨ Features Implemented

### Homepage
- ✅ Image slider with auto-rotation
- ✅ Animated event counters (Weddings: 500+, Birthdays: 350+, Parties: 800+)
- ✅ 6 "Why Choose Us" feature cards
- ✅ Gallery preview with 6 images
- ✅ Testimonials section
- ✅ Call-to-action buttons

### About Us
- ✅ Company story section
- ✅ 6 core values displayed as cards
- ✅ 6 facilities information
- ✅ Professional layout with images

### Gallery
- ✅ Three gallery categories (Weddings, Birthdays, Special Events)
- ✅ 18 total gallery items with hover effects
- ✅ Hover overlay with zoom icon
- ✅ Responsive grid layout

### Booking Form
- ✅ Lead capture form with fields for:
  - Name, Email, Phone
  - Event Type selection
  - Preferred Date
  - Number of Guests
  - Budget range
  - Additional details
- ✅ 4-step booking process explanation

### Reviews Page
- ✅ Review submission form with:
  - Name, Email, Event Type
  - Interactive star rating system
  - Review title and message
  - Consent checkbox
- ✅ Display of sample customer reviews

### Contact Us
- ✅ Contact form with subject selection
- ✅ Business information (Address, Phone, Email, Hours)
- ✅ Social media links
- ✅ 5 FAQ items
- ✅ Map integration placeholder

## 🚀 Getting Started

### Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js & npm
- Laravel 11
- Vite

### Installation Steps

1. **Navigate to project directory:**
   ```bash
   cd c:\wamp64\www\la-fortuna
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies:**
   ```bash
   npm install
   ```

4. **Configure environment (if needed):**
   ```bash
   copy .env.example .env
   php artisan key:generate
   ```

5. **Build assets:**
   ```bash
   npm run build
   ```

6. **Start development server:**
   ```bash
   php artisan serve
   ```

7. **Access website:**
   - Open browser and go to: `http://127.0.0.1:8000`
   - Homepage: `http://127.0.0.1:8000`
   - About: `http://127.0.0.1:8000/about`
   - Gallery: `http://127.0.0.1:8000/gallery`
   - Booking: `http://127.0.0.1:8000/booking`
   - Reviews: `http://127.0.0.1:8000/reviews`
   - Contact: `http://127.0.0.1:8000/contact`

## 🔧 Development Mode

For development with hot reloading:

**Terminal 1 - Vite Dev Server:**
```bash
npm run dev
```

**Terminal 2 - Laravel Dev Server:**
```bash
php artisan serve
```

## 📝 Customization Guide

### 1. Update Business Information

**File:** `resources/views/layouts/app.blade.php` & `resources/views/contact.blade.php`

Replace placeholder information:
- Address: "Your Address Here"
- Phone: "+1 (123) 456-7890"
- Email: "info@lafortuna.com"
- Hours: "Mon-Sun: 9AM - 11PM"

### 2. Replace Images

The website uses Unsplash URLs. To use your own images:

1. Remove image URLs from blade files
2. Add your images to `public/images/`
3. Update references: `{{ asset('images/your-image.jpg') }}`

### 3. Modify Colors

Edit CSS variables in `resources/css/app.css`:

```css
:root {
    --gold: #D4AF37;           /* Change primary color */
    --red: #C41E3A;            /* Change secondary color */
    --white: #FFFFFF;         /* Change accent color */
    /* ... more colors */
}
```

### 4. Update Statistics

**File:** `resources/views/home.blade.php`

Find the stats section and update:
```html
<div class="stat-number" data-target="500">0+</div>
<div class="stat-label">Weddings Hosted</div>
```

### 5. Add New Pages

1. Create new blade file in `resources/views/`
2. Add route in `routes/web.php`
3. Add navigation link in `resources/views/layouts/app.blade.php`

Example:
```php
Route::get('/services', function () {
    return view('services');
})->name('services');
```

## 📱 Responsive Breakpoints

- **Desktop:** 1200px+
- **Tablet:** 768px - 1199px
- **Mobile:** Below 768px

## 🎯 SEO Features

- ✅ Meta descriptions on all pages
- ✅ Semantic HTML structure
- ✅ Proper heading hierarchy
- ✅ Alt text on images
- ✅ Mobile-friendly design
- ✅ Fast loading times

## 🔒 Security Features

- ✅ Laravel's built-in CSRF protection
- ✅ Input validation ready
- ✅ XSS prevention
- ✅ SQL injection prevention (through Eloquent)

## 📧 Form Processing

Currently, forms show success alerts. To fully integrate:

### Option 1: Send Emails
```php
Route::post('/contact', function (Request $request) {
    Mail::send('emails.contact', $request->all(), function($m) {
        $m->to('admin@lafortuna.com')->subject('New Contact Form Submission');
    });
    return back()->with('success', 'Message sent!');
});
```

### Option 2: Save to Database
1. Create migration for forms
2. Create model
3. Handle POST request
4. Store data in database

## 🌐 Production Deployment

### 1. Build Assets for Production
```bash
npm run build
```

### 2. Environment Configuration
```bash
cp .env.example .env.production
php artisan key:generate
```

### 3. Upload to Server
- Upload `public/` folder to web root
- Upload other files outside web root
- Set proper permissions

### 4. Configure Web Server
```apache
<VirtualHost *:80>
    ServerName lafortuna.com
    DocumentRoot /var/www/lafortuna/public
    
    <Directory /var/www/lafortuna>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### 5. Set Up Database (if needed)
```bash
php artisan migrate
php artisan cache:clear
php artisan config:cache
```

## 🚨 Troubleshooting

### Issue: CSS not loading
**Solution:** Run `npm run build` and clear browser cache

### Issue: Navigation not working
**Solution:** Check routes in `routes/web.php`

### Issue: Forms not submitting
**Solution:** Add form handlers or update JavaScript

### Issue: Images not showing
**Solution:** Update image paths to correct URLs

## 📊 Performance Tips

1. Optimize images before uploading
2. Use CDN for static assets
3. Enable Laravel caching
4. Minify CSS/JS (done automatically)
5. Use lazy loading for images

## 🎁 Bonus Features

- Smooth scrolling behavior
- Mobile hamburger menu
- Scroll-to-top button
- Animated counters
- Hero image carousel
- Interactive forms
- Star rating system
- Social media links

## 📞 Support & Maintenance

### Regular Maintenance
- Update Laravel and packages: `composer update`
- Update Node packages: `npm update`
- Monitor error logs
- Backup database regularly

### Analytics Integration
Add to `resources/views/layouts/app.blade.php`:
```html
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_ID"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'GA_ID');
</script>
```

## 📚 Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Vite Documentation](https://vitejs.dev)
- [Bootstrap Classes Reference](https://getbootstrap.com)
- [Font Awesome Icons](https://fontawesome.com/icons)

## ✅ Checklist for Launch

- [ ] Update all business information
- [ ] Replace placeholder images
- [ ] Set up form handling
- [ ] Configure email notifications
- [ ] Test on all devices
- [ ] Set up analytics
- [ ] Configure robots.txt
- [ ] Set up sitemap.xml
- [ ] Test contact forms
- [ ] Verify all links work
- [ ] Set up SSL certificate
- [ ] Configure domain
- [ ] Set up backups

## 📄 License

Proprietary - La Fortuna Banquet Hall

---

**Created:** December 17, 2025
**Version:** 1.0
**Status:** Ready for Deployment ✅
