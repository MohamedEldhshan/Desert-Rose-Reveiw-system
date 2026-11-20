# Railway Deployment Guide

This guide explains how to deploy the Desert Rose Review System to Railway.

## Architecture

- **Framework:** Laravel 12 (PHP 8.2)
- **Database:** MySQL (Railway MySQL service)
- **Cache/Session:** `file` / `cookie` (no Redis required)
- **Queue:** `sync` (no queue worker required)
- **Mail:** `log` by default; configure SMTP for real delivery
- **Frontend:** Vite + Tailwind CSS (built during deploy)

## Files that control the deploy

| File | Purpose |
|------|---------|
| `nixpacks.toml` | Nixpacks build/start config (PHP 8.2, composer, npm, Vite build) |
| `railpack.json` | Railpack fallback config (PHP 8.2, `pdo_mysql`) |
| `Procfile` | Web process: `php -S 0.0.0.0:${PORT:-8000} -t public/` |
| `composer.json` / `composer.lock` | PHP dependencies (lockfile-driven install) |
| `package.json` / `package-lock.json` | Frontend dependencies (lockfile-driven install) |

> **Note:** The build phase runs `composer install`, `npm ci`, and `npm run build`.
> It does **not** generate `APP_KEY` or run migrations. Those are manual steps (see below).

## Railway dashboard setup

### 1. Create the project

1. Create a new Railway project.
2. Add a **MySQL** service.
3. Add your **application** service and connect it to the same project.

### 2. Set environment variables

In the application service → **Variables**, set:

```env
APP_NAME="Desert Rose Gifts"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app.railway.app
APP_KEY=base64:GENERATE_A_REAL_KEY

DB_CONNECTION=mysql
DATABASE_URL=mysql://user:password@host.railway.app:3306/railway

CACHE_STORE=file
SESSION_DRIVER=cookie
SESSION_SECURE_COOKIE=true
QUEUE_CONNECTION=sync
BROADCAST_CONNECTION=log
LOG_CHANNEL=stderr
LOG_LEVEL=info
FILESYSTEM_DISK=local

MAIL_MAILER=log
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="Desert Rose Gifts"
```

**Important:**
- `APP_KEY` must be a real key. Generate one locally with `php artisan key:generate --show` and paste the output.
- `DATABASE_URL` is provided automatically by Railway when you add a MySQL service. You can reference it directly or copy the value.
- Do **not** set `APP_DEBUG=true` in production.

### 3. Deploy

Push to the connected Git branch (or trigger a redeploy). Railway will:

1. Install PHP 8.2 + Composer + Node 20.
2. Run `composer install --no-dev --optimize-autoloader --no-interaction`.
3. Run `npm ci`.
4. Run `npm run build` (produces `public/build/manifest.json`).
5. Start the web server with `php -S 0.0.0.0:${PORT:-8000} -t public/`.

## Post-deploy steps (manual)

The build does **not** run migrations or create the admin user. Run these once after the first deploy:

### Run migrations

```bash
railway run "php artisan migrate --force"
```

### Create the admin user

```bash
railway run "php artisan admin:create admin@example.com --name=Admin"
```

This prints a generated password once. Store it securely.

### Verify

- Homepage: `https://your-app.railway.app`
- Health check: `https://your-app.railway.app/up`
- Admin login: `https://your-app.railway.app/login`
- Admin panel: `https://your-app.railway.app/admin/reviews`

## Troubleshooting

### 502 Bad Gateway / app not starting

Check logs:

```bash
railway logs -f
```

Common causes:
- `APP_KEY` missing or invalid → set a real `APP_KEY`.
- `DATABASE_URL` not set → add the MySQL service and reference its URL.
- `public/build/manifest.json` missing → the Vite build failed; check `npm run build` logs.

### Database connection errors

- Ensure `DB_CONNECTION=mysql` (lowercase).
- Ensure `DATABASE_URL` uses the Railway MySQL host, not `localhost`.
- Run `railway run "php artisan migrate --force"` after setting the DB vars.

### Admin login fails

- Confirm the admin user exists: `railway run "php artisan admin:create ..."`.
- Confirm `is_admin` is `true` in the `users` table.
- Confirm `APP_KEY` is set (sessions/encryption depend on it).

### Mail not sending

- Default `MAIL_MAILER=log` writes emails to the log (safe for testing).
- For real delivery, set `MAIL_MAILER=smtp` and the SMTP vars (`MAIL_HOST`, `MAIL_PORT`, `MAIL_SCHEME=tls`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_FROM_ADDRESS`).

## Security checklist

- [ ] `APP_DEBUG=false`
- [ ] `APP_ENV=production`
- [ ] `APP_KEY` is a real, unique key (not the dev key)
- [ ] `SESSION_SECURE_COOKIE=true` (HTTPS)
- [ ] `DATABASE_URL` uses Railway MySQL credentials
- [ ] Admin user created via `php artisan admin:create`
- [ ] No secrets committed to the repo (`.env` is gitignored)
- [ ] Migrations run manually after deploy

## Local development

```bash
composer install
npm ci
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan admin:create admin@example.com --name=Admin
npm run dev   # or npm run build
php artisan serve
```
