#!/bin/sh
set -eu
set -x

cd /app

# Ensure Laravel writable dirs are writable without using 777
mkdir -p storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache || true
chmod -R ug+rwX storage bootstrap/cache || true

# Optionally run migrations on startup (disabled by default; enable with RUN_MIGRATIONS=true)
if [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
  php artisan migrate --force || true
fi

# Cache config/routes/views for performance (idempotent)
php artisan optimize || true
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true
php artisan event:cache || true
php artisan filament:optimize || true
#php artisan scribe:generate || true

echo 'Starting supervisor...'

# Start process supervisor which will run web + workers
exec /usr/bin/supervisord -n -c /etc/supervisor/supervisord.conf
