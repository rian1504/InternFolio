# syntax=docker/dockerfile:1
# Production image for Laravel. Two final targets: "app" (php-fpm) and "web" (nginx).

ARG PHP_VERSION=8.4
ARG NODE_VERSION=22

# ---------- Stage 1: PHP dependencies ----------
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
# Extensions are installed in the runtime stage, so skip platform checks here
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist \
    --no-interaction --ignore-platform-reqs

# ---------- Stage 2: Frontend assets (Vite) ----------
FROM node:${NODE_VERSION}-alpine AS assets
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY . .
# Some Tailwind/Vite configs scan vendor/ views, so provide it
COPY --from=vendor /app/vendor ./vendor
RUN npm run build

# ---------- Stage 3: PHP-FPM runtime ----------
FROM php:${PHP_VERSION}-fpm-alpine AS app
COPY --from=ghcr.io/mlocati/php-extension-installer:latest /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions pdo_mysql redis bcmath intl zip gd opcache pcntl exif

COPY --from=vendor /usr/bin/composer /usr/bin/composer

RUN { \
      echo "expose_php=Off"; \
      echo "memory_limit=256M"; \
      echo "upload_max_filesize=20M"; \
      echo "post_max_size=20M"; \
      echo "opcache.enable=1"; \
      echo "opcache.memory_consumption=128"; \
      echo "opcache.validate_timestamps=0"; \
    } > /usr/local/etc/php/conf.d/zz-prod.ini

WORKDIR /var/www/html
COPY --chown=www-data:www-data . .
COPY --from=vendor --chown=www-data:www-data /app/vendor ./vendor
COPY --from=assets --chown=www-data:www-data /app/public/build ./public/build

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer dump-autoload --optimize --no-dev --no-scripts \
    && mkdir -p storage/app/public storage/framework/cache storage/framework/sessions \
                storage/framework/views storage/logs bootstrap/cache \
    && ln -sfn /var/www/html/storage/app/public public/storage \
    && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 9000
# php-fpm master runs as root and drops workers to www-data (standard setup).
CMD ["php-fpm"]

# ---------- Stage 4: Nginx (unprivileged, listens on 8080) ----------
FROM nginxinc/nginx-unprivileged:1.27-alpine AS web
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY --from=app /var/www/html/public /var/www/html/public
