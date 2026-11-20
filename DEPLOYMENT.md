# Desert Rose Review System — Deployment Guide

## Overview

Laravel 12 (PHP 8.2) review system for the Desert Rose herbal bazaar in Hurghada.

- **Public site:** homepage with reviews, contact page
- **Admin panel:** review moderation at `/admin/reviews` (requires admin login)
- **Languages:** English, Arabic, Russian, Ukrainian, French, German

## Requirements

- PHP 8.2+
- MySQL 8+
- Composer
- Node.js 20+ (for Vite build)

## Local setup

```bash
composer install
npm ci
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan admin:create admin@example.com --name=Admin
npm run build
php artisan serve
```

Visit `http://localhost:8000` and `http://localhost:8000/login`.

## Environment variables

See `.env.example` for the full list. Key production values:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
APP_KEY=base64:...

DB_CONNECTION=mysql
DATABASE_URL=mysql://user:pass@host:3306/db

CACHE_STORE=file
SESSION_DRIVER=cookie
SESSION_SECURE_COOKIE=true
QUEUE_CONNECTION=sync
LOG_CHANNEL=stderr
LOG_LEVEL=info

MAIL_MAILER=log   # or smtp with MAIL_HOST/MAIL_PORT/MAIL_SCHEME/MAIL_USERNAME/MAIL_PASSWORD
```

## Deployment (Railway)

See `RAILWAY_DEPLOYMENT.md` for the full Railway walkthrough.

Summary:
1. Add a MySQL service in Railway.
2. Set the environment variables above in the app service.
3. Push to Git — Railway builds with Nixpacks (`nixpacks.toml`).
4. After deploy, run migrations and create the admin user:
   ```bash
   railway run "php artisan migrate --force"
   railway run "php artisan admin:create admin@example.com --name=Admin"
   ```

## Admin access

- Login page: `/login`
- Admin panel: `/admin/reviews`
- Create the first admin with `php artisan admin:create <email>`.
- Only users with `is_admin = true` can access `/admin/*`.

## Migrations

Migrations are **not** run automatically during the build. Run them manually after each deploy:

```bash
php artisan migrate --force
```

## Testing

```bash
php artisan test
```

Tests use an in-memory SQLite database and do not require MySQL.

## Production build verification

```bash
composer validate
php artisan test
npm ci && npm run build
php artisan route:list
php artisan config:clear
```

Confirm `public/build/manifest.json` exists after `npm run build`.
