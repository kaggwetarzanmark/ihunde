FROM node:22-bookworm-slim AS frontend-build

WORKDIR /app

COPY package.json package-lock.json .npmrc ./
RUN npm ci

COPY . .
RUN npm run build

FROM php:8.3-apache-bookworm

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libcurl4-openssl-dev \
        libonig-dev \
        libxml2-dev \
        unzip \
    && docker-php-ext-install -j"$(nproc)" \
        curl \
        dom \
        fileinfo \
        mbstring \
        opcache \
        pdo_mysql \
        xml \
        xmlwriter \
    && a2enmod headers rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

ENV APP_ENV=production \
    APP_DEBUG=false \
    APP_MAINTENANCE_DRIVER=file \
    CACHE_STORE=file \
    FILESYSTEM_DISK=local \
    LOG_CHANNEL=stderr \
    LOG_LEVEL=info \
    PORT=10000 \
    QUEUE_CONNECTION=sync \
    SESSION_DRIVER=file \
    SESSION_SECURE_COOKIE=true \
    TRUSTED_PROXIES=REMOTE_ADDR

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --prefer-dist \
    --no-scripts \
    --no-autoloader

COPY . .
COPY --from=frontend-build /app/public/build ./public/build

RUN composer dump-autoload --no-dev --optimize --no-scripts \
    && composer check-platform-reqs --no-dev \
    && php artisan package:discover --ansi \
    && rm /usr/local/bin/composer \
    && mkdir -p \
        storage/framework/cache/data \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
        bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R ug+rwX storage bootstrap/cache

COPY docker/apache-vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/entrypoint.sh /usr/local/bin/laravel-entrypoint
RUN chmod +x /usr/local/bin/laravel-entrypoint

EXPOSE 10000

ENTRYPOINT ["/usr/local/bin/laravel-entrypoint"]
