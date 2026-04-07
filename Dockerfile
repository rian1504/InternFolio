FROM php:8.3-cli

# Install dependencies + extension penting
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip libicu-dev \
    && docker-php-ext-install intl zip pdo pdo_mysql

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Install dependency (production)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permission Laravel
RUN chmod -R 775 storage bootstrap/cache

CMD php artisan serve --host=0.0.0.0 --port=$PORT