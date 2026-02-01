FROM php:8.2-cli

# System deps
RUN apt-get update && apt-get install -y \
    git zip unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# COPY composer files FIRST (INI PENTING)
COPY composer.json composer.lock ./

# Install deps
RUN composer install --no-dev --optimize-autoloader

# Copy the rest of the app
COPY . .

EXPOSE 8080
CMD php -S 0.0.0.0:8080 -t public
