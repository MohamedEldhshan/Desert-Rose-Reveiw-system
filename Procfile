release: php artisan migrate --force && php artisan config:clear && php artisan route:cache
web: php -d memory_limit=-1 -S 0.0.0.0:${PORT} -t public/
