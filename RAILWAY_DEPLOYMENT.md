# 🚀 Railway.app Deployment Guide

## Prerequisites

- Railway account and project created
- MySQL database provisioned in Railway
- Environment variables configured in Railway dashboard

---

## Configuration Checklist ✅

### 1️⃣ Railway Environment Variables

Set these in your **Railway project dashboard** → **Variables**:

```env
# App Configuration
APP_NAME="Desert Rose"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.railway.app
APP_KEY=base64:YOUR_APP_KEY_HERE

# Database (Railway provides DATABASE_URL automatically)
# Option A: Use Railway's DATABASE_URL (RECOMMENDED)
DATABASE_URL=mysql://user:password@host.railway.app:3306/railway

# Option B: Or set individual variables
DB_CONNECTION=mysql
DB_HOST=your-mysql-host.railway.app
DB_PORT=3306
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=your-password

# Cache & Queue
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
REDIS_URL=redis://default:password@your-redis-host.railway.app:6379

# Mail (use SendGrid, Mailgun for production)
MAIL_MAILER=sendgrid
SENDGRID_API_KEY=your-sendgrid-api-key
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="Desert Rose"

# Session & Logging
SESSION_DRIVER=cookie
LOG_CHANNEL=stack
```

### 2️⃣ Files Changed for Railway

| File | What Changed | Why |
|------|-------------|-----|
| **railpack.json** | PHP 8.2 → **8.4**, added `pdo_mysql`, `zip`, `bcmath` | MySQL support + compatibility |
| **config/database.php** | Added `DATABASE_URL` priority, timeout settings | Parse Railway's DB connection string |
| **Procfile** | `artisan serve` → **PHP built-in server** + migrations | Better for production, runs migrations on deploy |
| **nixpacks.toml** | PHP 8.2 → **8.4**, optimized build + start phases | Aligns with railpack.json |

### 3️⃣ Database Setup

Railway creates `DATABASE_URL` automatically when MySQL is provisioned.

**Verify connection in Railway shell:**

```bash
railway connect
php artisan tinker
>>> DB::connection()->getPdo()
```

If you see connection info → ✅ Database is working

### 4️⃣ First Deploy

```bash
# Ensure all files are committed
git add .
git commit -m "Railway deployment configuration"
git push origin main
```

Railway will **automatically**:
1. ✅ Detect PHP 8.4 from railpack.json
2. ✅ Install `pdo_mysql` extension
3. ✅ Run `composer install --no-dev --optimize-autoloader`
4. ✅ Build frontend assets (`npm run build`)
5. ✅ Run migrations via Procfile release phase
6. ✅ Clear config cache
7. ✅ Start the web server

---

## Troubleshooting 🔧

### ❌ 502 Bad Gateway

**Step 1: Check logs**
```bash
railway logs -f
```

**Step 2: Common causes & fixes**

| Error | Cause | Fix |
|-------|-------|-----|
| `SQLSTATE[HY000]: General error: 2006 MySQL server has gone away` | DATABASE_URL not set | Set `DATABASE_URL` in Railway Variables |
| `Call to undefined function pdo_mysql` | Missing extension | Ensure `pdo_mysql` is in railpack.json |
| `SQLSTATE[HY000] [2002] Connection refused` | Connecting to localhost instead of Railway host | DATABASE_URL must use Railway MySQL host |
| `SQLSTATE[HY000] [2002] No such file or directory` | SQLite fallback (not MySQL) | Set `DB_CONNECTION=mysql` or use `DATABASE_URL` |

### ❌ Connection to localhost refused

**Root cause:** Config is falling back to `127.0.0.1`

**Fix:**
1. Railway Dashboard → Select your project
2. Go to **Variables** tab
3. Add/verify `DATABASE_URL`:
   ```
   DATABASE_URL=mysql://root:password@mysql.railway.internal:3306/railway
   ```
4. Trigger redeploy: `git commit --allow-empty -m "redeploy" && git push`

### ❌ pdo_mysql extension not found

**Fix:** Update railpack.json

```json
{
  "php": {
    "version": "8.4",
    "extensions": ["pdo_mysql", "ctype", "curl", ... ]
  }
}
```

Then push to trigger rebuild.

### ❌ Migrations not running

**Check:**
1. Procfile has `release:` phase
2. DATABASE_URL is correct
3. Check logs: `railway logs --tail=50`

**Manual fix:**
```bash
railway run "php artisan migrate --force"
```

### ❌ APP_KEY not set / APP_KEY is invalid

**Fix:**
```bash
# Locally
php artisan key:generate --show
# Output: base64:XXXXX...
```

Set this in Railway Variables as `APP_KEY`.

---

## Deployment Checklist 📋

Before pushing to production:

- [ ] `DATABASE_URL` set in Railway Variables
- [ ] `APP_KEY` generated and set (base64 encoded)
- [ ] `APP_DEBUG=false`
- [ ] `APP_ENV=production`
- [ ] `MAIL_MAILER` configured (not mail.log)
- [ ] `CACHE_DRIVER=redis` or `file` if no Redis
- [ ] All `.env` secrets are in Railway, NOT in repo
- [ ] `railpack.json` has PHP 8.4 + `pdo_mysql`
- [ ] `Procfile` has release phase with migrations
- [ ] Run locally: `php artisan migrate` (to test DB config)

---

## Quick Commands 🚀

```bash
# View live logs
railway logs -f

# SSH into Railway container
railway connect

# Run artisan command on Railway
railway run "php artisan migrate --force"

# Check environment variables
railway run "printenv | grep DATABASE_URL"

# Clear cache on Railway
railway run "php artisan config:clear && php artisan cache:clear"

# Rollback migrations if needed
railway run "php artisan migrate:rollback"
```

---

## Post-Deployment 🎉

Once deployed:

1. **Test the site:**
   ```
   https://your-app.railway.app
   ```

2. **Check admin panel:**
   ```
   https://your-app.railway.app/admin/reviews
   ```

3. **Verify database:**
   ```bash
   railway connect
   php artisan tinker
   >>> Review::count()
   >>> Herb::count()
   ```

---

## Support & Reference

- **Railway Docs:** https://docs.railway.app
- **Laravel on Railway:** https://docs.railway.app/guides/laravel
- **Railpack (PHP):** https://nixpacks.com/docs/languages/php
- **Database URL Format:** `mysql://user:password@host:3306/database`

