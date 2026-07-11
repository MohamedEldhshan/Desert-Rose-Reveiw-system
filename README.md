# 🌿 Desert Rose Herbal Bazaar - Review System

A modern, Shopify-inspired review system for Desert Rose Herbal Bazaar in Hurghada, Egypt. Built with Laravel 12, Docker, and featuring a comprehensive herbs catalog, customer reviews, and admin panel.

## ✨ Features

### 🏠 Frontend
- **Modern UI/UX**: Shopify-inspired design with Tailwind CSS
- **Hero Section**: Beautiful hero with statistics and CTAs
- **Gallery Carousel**: 5-slide image gallery
- **Testimonials**: Dynamic customer review carousel
- **Review Form**: Star rating system with validation
- **Herbs Catalog**: 13+ herbs with detailed descriptions
- **Contact Page**: Full contact form with business info
- **Reviews List**: Paginated reviews with filters
- **Multi-language**: English and Arabic support

### 🔧 Backend
- **Admin Panel**: Complete review management system
- **Email Notifications**: Review approval/rejection emails
- **Contact Forms**: Email notifications for inquiries
- **Database**: MySQL with migrations
- **Cache**: Redis for performance
- **Queue**: Background job processing

### 🐳 Docker
- **Fully Containerized**: All services in Docker
- **MySQL 8.4**: Database service
- **Redis**: Cache and queue
- **Mailpit**: Email testing
- **Laravel Sail**: Development environment

## 🚀 Quick Start

### Prerequisites
- Docker Desktop installed and running
- Git

### Step 1: Start Docker Desktop
Make sure Docker Desktop is running on your system.

### Step 2: Start Containers
```bash
docker compose up -d
```

### Step 3: Run Migrations
```bash
docker compose exec laravel.test php artisan migrate
```

### Step 4: Seed Herbs Data
```bash
docker compose exec laravel.test php artisan db:seed --class=HerbSeeder
```

### Step 5: Build Frontend Assets
```bash
docker compose exec laravel.test npm run build
```

### Step 6: Access the Application
- **Main Site**: http://localhost
- **Admin Panel**: http://localhost/admin/reviews
- **Mailpit**: http://localhost:8025

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
│   │   ├── create_reviews_table.php
│   │   └── create_herbs_table.php
│   └── seeders/
│       └── HerbSeeder.php           # 13 pre-populated herbs
├── public/
│   └── images/
│       ├── desert-rose-logo.png
│       ├── hero/                    # 5 hero images
│       └── herbs/                   # Herb images (add yours)
├── resources/views/
│   ├── admin/
│   │   └── reviews.blade.php        # Admin panel
│   ├── components/
│   │   ├── gallery.blade.php
│   │   ├── hero.blade.php
│   │   ├── review-form.blade.php
│   │   └── testimonials.blade.php
│   ├── contact/
│   │   └── index.blade.php
│   ├── emails/
│   │   ├── contact-submitted.blade.php
│   │   ├── review-approved.blade.php
│   │   └── review-rejected.blade.php
│   ├── herbs/
│   │   ├── index.blade.php          # Herbs catalog
│   │   └── show.blade.php           # Herb details
│   ├── layouts/
│   │   ├── admin.blade.php
│   │   └── app.blade.php
│   ├── partials/
│   │   └── navbar.blade.php
│   ├── reviews/
│   │   └── list.blade.php           # All reviews
│   └── home.blade.php
├── compose.yaml                     # Docker Compose
└── .env                            # Environment variables
```

## 🌿 Herbs Catalog

The system includes 13 pre-populated herbs:

1. **Black Seed (Nigella Sativa)** - حبة البركة
2. **Hibiscus (Karkade)** - الكركديه
3. **Chamomile** - البابونج
4. **Anise** - الينسون
5. **Cumin** - الكمون
6. **Fennel** - الشمر
7. **Ginger** - الزنجبيل
8. **Turmeric** - الكركم
9. **Saffron** - الزعفران
10. **Mint** - النعناع
11. **Cardamom** - الهيل
12. **Frankincense Oil** - زيت اللبان
13. **Black Seed Oil** - زيت حبة البركة

Each herb includes:
- Name in English and Arabic
- Detailed description
- Health benefits
- Usage instructions
- Category (herbs, spices, oils)

## 🎨 Adding Herb Images

To add images for the herbs catalog:

1. Create folder: `public/images/herbs/`
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

**Recommended**: White background, 500x500px or larger, high quality

## 🔧 Common Commands

### Docker
```bash
# Start containers
docker compose up -d

# Stop containers
docker compose down

# View logs
docker compose logs -f laravel.test

# Restart containers
docker compose restart
```

### Laravel
```bash
# Run migrations
docker compose exec laravel.test php artisan migrate

# Seed database
docker compose exec laravel.test php artisan db:seed

# Clear cache
docker compose exec laravel.test php artisan cache:clear
```

### NPM
```bash
# Install dependencies
docker compose exec laravel.test npm install

# Build for production
docker compose exec laravel.test npm run build

# Watch for changes
docker compose exec laravel.test npm run dev
```

## 📊 Admin Panel

Access at: http://localhost/admin/reviews

**Features:**
- View all reviews (pending, approved, featured)
- Approve/reject reviews with email notifications
- Feature/unfeature reviews
- Bulk actions (approve, reject, delete)
- Search and filter
- Statistics dashboard

## 📧 Email Notifications

The system sends emails for:
- ✅ Review approval
- ❌ Review rejection
- 📬 Contact form submissions

**Note**: Uses Mailpit for testing at http://localhost:8025

## 🌐 Multi-Language Support

Currently supports:
- English (en)
- Arabic (ar)

All herb descriptions, navigation, and forms are bilingual.

## 🔒 Security Notes

**For Production:**
1. Change default passwords in `.env`
2. Generate new `APP_KEY`
3. Set `APP_DEBUG=false`
4. Use real email service
5. Add authentication for admin panel

## 📝 License

This project is proprietary software for Desert Rose Herbal Bazaar.

## 📞 Support

For detailed deployment instructions, see [DEPLOYMENT.md](DEPLOYMENT.md)

---

**Version**: 1.0.0  
**Last Updated**: May 2026  
**Built with**: Laravel 12, PHP 8.5, MySQL 8.4, Docker, Tailwind CSS
