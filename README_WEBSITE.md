# La Fortuna Banquet Hall Website

A modern, elegant, and fully responsive website for La Fortuna Banquet Hall built with Laravel.

## Design Theme

- **Primary Color**: Golden (#D4AF37)
- **Secondary Color**: Red (#C41E3A)
- **Accent Color**: White (#FFFFFF)

## Features

### Pages Included:

1. **Homepage** - Features:
   - Hero banner with image slider
   - Event counter (Weddings, Birthdays, Parties)
   - Why Choose Us section
   - Gallery preview
   - Testimonials
   - Call-to-action sections

2. **About Us** - Features:
   - Company story
   - Core values
   - Facilities information
   - Team introduction

3. **Gallery** - Features:
   - Wedding gallery
   - Birthday celebrations gallery
   - Special events gallery
   - Lightbox image viewing

4. **Booking Form** - Features:
   - Lead capture form
   - Event type selection
   - Date and guest count
   - Budget estimation
   - Booking process timeline

5. **Reviews** - Features:
   - Review submission form
   - Star rating system
   - Recent reviews display
   - Not included in main navigation

6. **Contact Us** - Features:
   - Contact form
   - Business information
   - Map integration placeholder
   - FAQ section
   - Social media links

## Key Features

- ✅ Fully responsive design (mobile, tablet, desktop)
- ✅ Modern gradient color scheme with Golden/White/Red theme
- ✅ Smooth scroll animations
- ✅ Interactive navigation with mobile menu
- ✅ Hero image slider
- ✅ Animated statistics counters
- ✅ Contact and booking forms
- ✅ Star rating system for reviews
- ✅ Gallery with hover effects
- ✅ Scroll-to-top button
- ✅ SEO-friendly structure
- ✅ Font Awesome icons
- ✅ Google Fonts (Playfair Display & Montserrat)

## Installation & Setup

1. Make sure you have PHP, Composer, and Node.js installed

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install Node.js dependencies:
   ```bash
   npm install
   ```

4. Create environment file:
   ```bash
   copy .env.example .env
   ```

5. Generate application key:
   ```bash
   php artisan key:generate
   ```

6. Build assets:
   ```bash
   npm run build
   ```

7. Start the development server:
   ```bash
   php artisan serve
   ```

8. Visit the website at: http://localhost:8000

## For Development (with hot reload):

```bash
npm run dev
```

Then in another terminal:
```bash
php artisan serve
```

## Project Structure

```
resources/
├── css/
│   └── app.css          # All custom styles with Golden/White/Red theme
├── js/
│   └── app.js           # JavaScript for interactions and animations
└── views/
    ├── layouts/
    │   └── app.blade.php    # Main layout template
    ├── home.blade.php       # Homepage
    ├── about.blade.php      # About Us page
    ├── gallery.blade.php    # Gallery page
    ├── booking.blade.php    # Booking form page
    ├── reviews.blade.php    # Reviews page
    └── contact.blade.php    # Contact page
```

## Customization

### To Update Images:
Replace the Unsplash URLs in the blade files with your own images.

### To Update Contact Information:
Edit the footer and contact page in:
- `resources/views/layouts/app.blade.php` (footer)
- `resources/views/contact.blade.php` (contact page)

### To Update Colors:
Modify the CSS variables in `resources/css/app.css`:
```css
:root {
    --gold: #D4AF37;
    --red: #C41E3A;
    --white: #FFFFFF;
    /* ... other colors */
}
```

### To Update Business Information:
Edit the following files:
- Footer: `resources/views/layouts/app.blade.php`
- Contact Info: `resources/views/contact.blade.php`
- About Info: `resources/views/about.blade.php`

## Form Submissions

Currently, forms display success messages via JavaScript alerts. To enable actual form processing:

1. Create controllers for form handling
2. Set up database migrations for storing leads/reviews
3. Configure email notifications
4. Add CSRF protection (already included in Laravel)

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance Optimizations

- Optimized images (use WebP format for production)
- Lazy loading for images
- Minified CSS and JavaScript
- CDN for external libraries (Font Awesome, Google Fonts)

## Future Enhancements

- [ ] Admin panel for content management
- [ ] Database integration for forms
- [ ] Email notifications for bookings
- [ ] Image gallery lightbox with full features
- [ ] Blog section
- [ ] Online payment integration
- [ ] Calendar availability system
- [ ] Multi-language support

## License

Proprietary - La Fortuna Banquet Hall

## Support

For questions or support, contact: info@lafortuna.com
