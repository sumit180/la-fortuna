# La Fortuna Website - Quick Reference Guide

## 🌐 Website URLs

| Page | URL | Purpose |
|------|-----|---------|
| Homepage | `/` | Main landing page |
| About Us | `/about` | Company information |
| Gallery | `/gallery` | Photo gallery |
| Booking | `/booking` | Event booking form |
| Reviews | `/reviews` | Customer reviews (hidden in nav) |
| Contact | `/contact` | Contact form & info |

## 🎨 Customization Locations

### Color Changes
**File:** `resources/css/app.css` (Lines 1-16)
```css
:root {
    --gold: #D4AF37;
    --red: #C41E3A;
    --white: #FFFFFF;
}
```

### Business Information
| Information | Location |
|------------|----------|
| Company Name | Layout header |
| Address | `contact.blade.php` Line ~60 |
| Phone | Layout footer |
| Email | Contact page |
| Hours | Footer & About |
| Social Links | Footer & Contact |

### Images
**All images use Unsplash URLs - Replace with your own:**
- Homepage: 3 hero slides
- Gallery: 18 gallery items
- About: 1 main image
- All other pages: Various background images

### Counter Numbers
**File:** `resources/views/home.blade.php` (Line ~50)
```html
<div class="stat-number" data-target="500">0+</div>
```

## 📋 File Structure at a Glance

```
La Fortuna Website Root
├── public/
│   ├── build/              (Compiled assets)
│   │   └── assets/
│   │       ├── app-*.css   (Minified CSS)
│   │       └── app-*.js    (Minified JS)
│   ├── index.php           (Entry point)
│   └── images/             (Add your images here)
│
├── resources/
│   ├── css/
│   │   └── app.css         (1000+ lines of styles)
│   ├── js/
│   │   └── app.js          (400+ lines of JS)
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── home.blade.php
│       ├── about.blade.php
│       ├── gallery.blade.php
│       ├── booking.blade.php
│       ├── reviews.blade.php
│       └── contact.blade.php
│
├── routes/
│   └── web.php             (Page routes)
│
├── app/
├── config/
├── database/
├── storage/
└── vendor/
```

## 🚀 Common Tasks

### Start Development
```bash
npm run dev              # Terminal 1
php artisan serve       # Terminal 2
```

### Build for Production
```bash
npm run build
```

### Add a New Page
1. Create file: `resources/views/newpage.blade.php`
2. Add route in `routes/web.php`:
```php
Route::get('/newpage', fn() => view('newpage'))->name('newpage');
```
3. Add navigation link in `layouts/app.blade.php`

### Update Image
1. Add image to `public/images/`
2. Replace image URL in blade file
3. Or use: `{{ asset('images/filename.jpg') }}`

### Change Font
Current fonts: Playfair Display (headings), Montserrat (body)
Edit in `layouts/app.blade.php` Google Fonts link

### Update Business Hours
Edit in:
- `layouts/app.blade.php` (Footer)
- `contact.blade.php` (Contact page)
- `about.blade.php` (About page)

## 🎯 SEO Optimization

### Update Meta Tags
**File:** `resources/views/layouts/app.blade.php`
```blade
<title>@yield('title', 'Default Title')</title>
<meta name="description" content="@yield('description', 'Default description')">
```

Each page sets its own title and description using `@section`

### Add Google Analytics
Add to `layouts/app.blade.php` in `<head>` section:
```html
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_XXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'GA_XXXXX');
</script>
```

## 💾 Database Integration

### For Form Submissions (Optional)

1. Create migration:
```bash
php artisan make:migration create_bookings_table
php artisan make:migration create_reviews_table
```

2. Create models:
```bash
php artisan make:model Booking
php artisan make:model Review
```

3. Create controllers:
```bash
php artisan make:controller BookingController
php artisan make:controller ReviewController
```

4. Handle form POST requests in routes/web.php

## 🔐 Security Considerations

- ✅ CSRF tokens are included (Laravel automatic)
- ✅ Input validation ready to implement
- ✅ XSS protection built-in
- ✅ Rate limiting can be added
- ✅ Email verification can be added

### Basic validation example:
```php
$validated = request()->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email',
    'message' => 'required|string|max:1000',
]);
```

## 📱 Mobile Optimization

- Hamburger menu (auto-hidden on <768px)
- Touch-friendly buttons
- Responsive images
- Mobile-first CSS
- 60%+ of CSS is responsive

### Test on Mobile:
- Open DevTools (F12)
- Toggle device toolbar (Ctrl+Shift+M)
- Test all pages

## ⚡ Performance Checklist

- [ ] Images optimized (WebP format)
- [ ] Minify CSS/JS (automatic with build)
- [ ] Enable caching headers
- [ ] Use CDN for static files
- [ ] Lazy load images
- [ ] Minimize HTTP requests
- [ ] Enable GZIP compression

## 🎨 CSS Classes Quick Reference

| Class | Purpose |
|-------|---------|
| `.btn` | Base button style |
| `.btn-primary` | Gold gradient button |
| `.btn-secondary` | Red gradient button |
| `.section` | Page section (100px padding) |
| `.container` | Max-width wrapper |
| `.hero` | Hero banner section |
| `.gallery-grid` | Responsive gallery |
| `.feature-card` | Feature card box |
| `.form-control` | Form input/select |

## 🔗 External Libraries

- **Font Awesome:** Icon library
- **Google Fonts:** Typography
- **Unsplash:** Image library
- **Vite:** Build tool
- **Laravel:** Framework
- **Blade:** Templating

## 📊 Analytics Implementation

Track important events:
- Form submissions
- Page views
- Booking clicks
- Gallery interactions
- Contact form submissions

## 🆘 Quick Fixes

**Issue: Page not found**
- Check route in `routes/web.php`
- Restart server: `php artisan serve`

**Issue: Styles not updating**
- Clear cache: `Ctrl+Shift+Delete` in browser
- Rebuild: `npm run build`

**Issue: JavaScript not working**
- Check console (F12)
- Verify script is loaded
- Check for errors in `app.js`

**Issue: Images not loading**
- Check image path
- Verify file exists
- Check file permissions

## 📞 Contact Information Template

Replace these throughout the site:
```
La Fortuna Banquet Hall
123 Celebration Avenue
Your City, State 12345
United States

Phone: +1 (123) 456-7890
Email: info@lafortuna.com
Website: lafortuna.com

Hours:
Monday - Friday: 9:00 AM - 6:00 PM
Saturday - Sunday: 10:00 AM - 4:00 PM
```

## 🎁 Bonus Features Already Included

✅ Mobile hamburger menu
✅ Smooth page scrolling
✅ Auto-playing hero carousel
✅ Animated counter numbers
✅ Hover effects on cards
✅ Scroll-to-top button
✅ Interactive star ratings
✅ Form validation ready
✅ Social media links
✅ Responsive grid layouts

## 📚 Learning Resources

To modify further:
- Laravel Guide: https://laravel.com/docs/11.x
- CSS Guide: https://developer.mozilla.org/en-US/docs/Web/CSS
- JavaScript: https://developer.mozilla.org/en-US/docs/Web/JavaScript
- Blade: https://laravel.com/docs/11.x/blade

---

**Last Updated:** December 17, 2025
**Version:** 1.0
