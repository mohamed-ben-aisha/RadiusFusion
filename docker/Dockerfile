## Pin to a PHP 8.4-compatible FrankenPHP image to match composer.json
# You can adjust the exact tag to the latest 8.4 variant you use internally.
FROM dunglas/frankenphp:php8.4 AS php-builder

# Install required PHP extensions for the app
# - add curl to satisfy ext-curl requirement
RUN install-php-extensions \
    gd \
    pdo_pgsql \
    intl \
    zip \
    sockets \
    exif \
    curl

# Install Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory early
WORKDIR /app

# Copy composer files first for better Docker layer caching
COPY composer.json composer.lock* /app/

# Install dependencies (no-dev) with optimized autoloader
RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist --no-ansi --no-progress --optimize-autoloader --classmap-authoritative

# Copy the rest of the application
COPY . /app

# Now that the full app is present, run scripts and finalize autoloader
RUN composer install --no-dev --no-interaction --prefer-dist --no-ansi --no-progress --optimize-autoloader --classmap-authoritative

# Build static assets with Node in a separate stage
FROM node:20-alpine AS frontend
WORKDIR /app
COPY package.json package-lock.json /app/
RUN npm ci --no-audit --no-fund
COPY . /app
# Ensure PHP vendor is available for Vite CSS imports that reference /vendor
COPY --from=php-builder /app/vendor /app/vendor
RUN npm run build

# Final runtime image
FROM dunglas/frankenphp:php8.4
ENV COMPOSER_ALLOW_SUPERUSER=1 \
    TZ=Africa/Tripoli \
    DEBIAN_FRONTEND=noninteractive
WORKDIR /app

# Re-install extensions to ensure parity in final stage
RUN install-php-extensions \
    pdo_pgsql \
    intl \
    zip \
    sockets \
    exif \
    curl \
    redis \
    opcache

RUN apt-get update  \
    && apt-get install -y --no-install-recommends procps supervisor tzdata gnupg2 lsb-release \
    && sh -c 'echo "deb http://apt.postgresql.org/pub/repos/apt $(lsb_release -cs)-pgdg main" > /etc/apt/sources.list.d/pgdg.list' \
    && curl -fsSL https://www.postgresql.org/media/keys/ACCC4CF8.asc | gpg --dearmor -o /etc/apt/trusted.gpg.d/postgresql.gpg \
    && apt-get update \
    && apt-get install -y --no-install-recommends postgresql-client-17 \
    && ln -snf /usr/share/zoneinfo/$TZ /etc/localtime \
    && echo $TZ > /etc/timezone \
    && rm -rf /var/lib/apt/lists/* \
    && apt-get clean \
    && rm -rf /var/cache/apt/archives /var/cache/apt/archives/partial

# Copy app and vendor from builder
COPY --from=php-builder /app /app
# Overwrite built assets from frontend stage
COPY --from=frontend /app/public/build /app/public/build

# Ensure writable directories exist with sane permissions
RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R ug+rwX storage bootstrap/cache \
    # Create public/storage symlink at build-time to avoid permission issues at runtime
    && rm -f /app/public/storage \
    && ln -s /app/storage/app/public /app/public/storage \
    && chown -R www-data:www-data /app/public/storage \
    && chmod -R ug+rwX /app/public/storage

# Environment defaults for production safety (can be overridden at deploy time)
ENV APP_ENV=production \
    APP_DEBUG=false \
    RUN_MIGRATIONS=false

RUN mkdir -p /data/caddy /config/caddy \
    && chown -R www-data:www-data /data /config

# Expose unprivileged port and drop root
EXPOSE 8080

COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
COPY docker/supervisord.conf /etc/supervisor/supervisord.conf
RUN chmod +x /usr/local/bin/entrypoint.sh \
    && mkdir -p /var/log/supervisor

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
# Enable OPCache for performance and raise body/time/memory limits for large transfers
RUN sed -i "s/^;opcache.enable=.*/opcache.enable=1/" "$PHP_INI_DIR/php.ini"

# Set entrypoint (supervisord is launched from the script)
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
#
## Basic healthcheck against the root path; adjust as needed
HEALTHCHECK --interval=5s --timeout=5s --start-period=5s --retries=3 \
  CMD php -r "exit(@fsockopen('127.0.0.1', 8080) ? 0 : 1);"
