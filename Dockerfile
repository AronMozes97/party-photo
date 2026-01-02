FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libicu-dev libpng-dev libonig-dev \
 && docker-php-ext-install pdo_mysql zip intl \
 && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Optional: better DX for Laravel (permissions)
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

WORKDIR /var/www/html
