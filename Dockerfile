FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip libicu-dev \
    && docker-php-ext-install intl zip pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN chmod -R 775 storage bootstrap/cache

CMD php -S 0.0.0.0:$PORT -t public