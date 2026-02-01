FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# 🔥 WAJIB ADA — INI YANG MEMBUAT vendor/
RUN composer install --no-dev --optimize-autoloader

# Expose port Railway
EXPOSE 8080

# Start Laravel
CMD php -S 0.0.0.0:8080 -t public
