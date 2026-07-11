# Desert Rose Herbal Bazaar - Deployment Guide

## 📋 Overview
This guide will help you deploy the Desert Rose Herbal Bazaar review system to production using Docker.

## 🚀 Quick Start

### Prerequisites
- Docker Desktop installed and running
- Git
- Basic knowledge of command line

### Step 1: Start Docker Desktop
Make sure Docker Desktop is running on your system before proceeding.

### Step 2: Run Database Migrations
```bash
docker compose exec laravel.test php artisan migrate
```

### Step 3: Seed Herbs Data
```bash
docker compose exec laravel.test php artisan db:seed --class=HerbSeeder
```

### Step 4: Build Frontend Assets
```bash
docker compose exec laravel.test npm run build
```

### Step 5: Access the Application
- **Main Site**: http://localhost
- **Admin Panel**: http://localhost/admin/reviews
- **Mailpit (Email Testing)**: http://localhost:8025

## 📁 Project Structure

```
Desert-Rose-Review-system/
├── app/
│   ├── Http/Controllers/
│   │   ├── AdminController.php      # Review management
│   │   ├── ContactController.php    # Contact form
│   │   ├── HerbController.php       # Herbs catalog
│   │   └── ReviewController.php     # Reviews system
│   ├── Mail/
│   │   ├── ContactFormSubmitted.php
│   │   ├── ReviewApproved.php
│   │   └── ReviewRejected.php
│   └── Models/
│       ├── Herb.php                 # Herb model
│       └── Review.php               # Review model
├── database/
│   ├── migrations/
│   │   ├── 2026_01_11_110937_create_reviews_table.php
│   │   └── 2026_05_01_000001_create_herbs_table.php
│   └── seeders/
│       └── HerbSeeder.php           # Pre-populated herbs data
├── public/
│   └── images/
│       ├── desert-rose-logo.png
│       ├── hero/                    # Hero section images
│       └── herbs/                   # Herbs catalog images (to be added)
├── resources/
│   ├── views/
│   │   ├── admin/
│   │   │   └── reviews.blade.php    # Admin panel
│   │   ├── components/
│   │   │   ├── gallery.blade.php
│   │   │   ├── hero.blade.php
│   │   │   ├── review-form.blade.php
│   │   │   └── testimonials.blade.php
│   │   ├── contact/
│   │   │   └── index.blade.php     # Contact page
│   │   ├── emails/
│   │   │   ├── contact-submitted.blade.php
│   │   │   ├── review-approved.blade.php
│   │   │   └── review-rejected.blade.php
│   │   ├── herbs/
│   │   │   ├── index.blade.php     # Herbs catalog
│   │   │   └── show.blade.php      # Herb details
│   │   ├── layouts/
│   │   │   ├── admin.blade.php
│   │   │   └── app.blade.php
│   │   ├── partials/
│   │   │   └── navbar.blade.php
│   │   ├── reviews/
│   │   │   └── list.blade.php      # All reviews
│   │   └── home.blade.php
│   └── css/app.css
├── compose.yaml                     # Docker Compose configuration
└── .env                            # Environment variables
```

## 🎨 Features Implemented

### ✅ Completed Features
1. **Admin Panel**
   - Review management (approve, reject, delete)
   - Bulk actions
   - Search and filter
   - Statistics dashboard

2. **Herbs Catalog**
   - 13 pre-populated herbs with descriptions
   - Categories (herbs, spices, oils)
   - Search and filter functionality
   - Detailed herb pages with benefits and usage

3. **Contact Page**
   - Contact form with validation
   - Business information
   - Google Maps integration
   - Email notifications

4. **Reviews System**
   - Star rating system
   - Review list with pagination
   - Filter by rating
   - Sort options (latest, oldest, highest, lowest)

5. **Email Notifications**
   - Review approval/rejection emails
   - Contact form submissions
   - Professional email templates

6. **Docker Integration**
   - Fully containerized application
   - MySQL database
   - Redis cache
   - Mailpit for email testing

## 🔧 Configuration

### Environment Variables (.env)
```env
APP_NAME=Laravel
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=desert_rose
DB_USERNAME=sail
DB_PASSWORD=password

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Docker Services
- **laravel.test**: PHP 8.5 application
- **mysql**: MySQL 8.4 database
- **redis**: Redis cache
- **mailpit**: Email testing service

## 📝 Adding Herb Images

To add images for the herbs catalog:

1. Create a folder: `public/images/herbs/`
2. Add images with these names:
   - black-seed.jpg
   - hibiscus.jpg
   - chamomile.jpg
   - anise.jpg
   - cumin.jpg
   - fennel.jpg
   - ginger.jpg
   - turmeric.jpg
   - saffron.jpg
   - mint.jpg
   - cardamom.jpg
   - frankincense-oil.jpg
   - black-seed-oil.jpg

**Image Requirements:**
- Format: JPG or PNG
- Background: White (preferred)
- Size: 500x500px or larger
- Quality: High resolution

## 🌐 Multi-Language Support

The system supports both English and Arabic:

### Current Implementation
- Herb names and descriptions in both languages
- Navigation labels bilingual
- Hero section bilingual
- Review form bilingual

### Adding New Languages
To add more languages, update the Herb model:

```php
public function getNameAttribute()
{
    $locale = app()->getLocale();
    if ($locale === 'ar') {
        return $this->name_ar;
    } elseif ($locale === 'fr') {
        return $this->name_fr ?? $this->name_en;
    }
    return $this->name_en;
}
```

## 🛠️ Common Commands

### Docker Commands
```bash
# Start containers
docker compose up -d

# Stop containers
docker compose down

# View logs
docker compose logs -f laravel.test

# Restart containers
docker compose restart

# Access Laravel shell
docker compose exec laravel.test sh
```

### Laravel Commands
```bash
# Run migrations
docker compose exec laravel.test php artisan migrate

# Rollback migrations
docker compose exec laravel.test php artisan migrate:rollback

# Clear cache
docker compose exec laravel.test php artisan cache:clear

# Clear config cache
docker compose exec laravel.test php artisan config:clear

# Seed database
docker compose exec laravel.test php artisan db:seed

# Run specific seeder
docker compose exec laravel.test php artisan db:seed --class=HerbSeeder
```

### NPM Commands
```bash
# Install dependencies
docker compose exec laravel.test npm install

# Build for production
docker compose exec laravel.test npm run build

# Watch for changes (development)
docker compose exec laravel.test npm run dev
```

## 🔒 Security Considerations

### For Production
1. **Change default passwords**:
   - Update `DB_PASSWORD` in `.env`
   - Generate new `APP_KEY`

2. **Disable debug mode**:
   ```env
   APP_DEBUG=false
   APP_ENV=production
   ```

3. **Use real email service**:
   ```env
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=587
   MAIL_USERNAME=your-email@gmail.com
   MAIL_PASSWORD=your-app-password
   MAIL_ENCRYPTION=tls
   ```

4. **Add authentication**:
   - Implement admin login
   - Protect admin routes

## 📊 Admin Panel Access

### Default Access
- URL: http://localhost/admin/reviews
- **Note**: Currently no authentication required (add for production)

### Admin Features
- View all reviews (pending, approved, featured)
- Approve/reject reviews
- Feature/unfeature reviews
- Bulk actions
- Search and filter
- Delete reviews

## 🐛 Troubleshooting

### Issue: Containers won't start
**Solution**: Make sure Docker Desktop is running

### Issue: Database connection error
**Solution**: Check that `DB_HOST=mysql` matches the service name in `compose.yaml`

### Issue: Images not loading
**Solution**: Ensure images exist in `public/images/herbs/` folder

### Issue: Emails not sending
**Solution**: Check Mailpit at http://localhost:8025

### Issue: Migration errors
**Solution**: Run `docker compose exec laravel.test php artisan migrate:fresh`

## 📈 Performance Optimization

### For Production
1. Enable caching:
   ```bash
   docker compose exec laravel.test php artisan config:cache
   docker compose exec laravel.test php artisan route:cache
   docker compose exec laravel.test php artisan view:cache
   ```

2. Use queue for emails:
   ```bash
   docker compose exec laravel.test php artisan queue:work
   ```

3. Optimize images:
   - Compress images before uploading
   - Use WebP format

## 🚀 Deployment to Production

### Option 1: Docker Cloud (Recommended)
1. Push code to GitHub
2. Connect to Docker Cloud or Portainer
3. Deploy using existing `compose.yaml`

### Option 2: VPS
1. Install Docker on server
2. Clone repository
3. Copy `.env` file
4. Run `docker compose up -d --build`
5. Configure domain and SSL

### Option 3: Laravel Forge
1. Connect repository
2. Configure server
3. Deploy using Forge's Docker integration

## 📞 Support

For issues or questions:
- Check logs: `docker compose logs -f laravel.test`
- Review documentation in this file
- Contact development team

## 🔄 Updates

To update the application:
```bash
# Pull latest changes
git pull

# Rebuild containers
docker compose up -d --build

# Run migrations
docker compose exec laravel.test php artisan migrate

# Clear cache
docker compose exec laravel.test php artisan cache:clear
```

## 📝 Notes

- The system uses Laravel 12.0 with PHP 8.5
- Frontend built with Vite and Tailwind CSS
- Database: MySQL 8.4
- Cache: Redis
- Email testing: Mailpit

---

**Last Updated**: May 2026
**Version**: 1.0.0
