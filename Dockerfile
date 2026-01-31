FROM php:8.2-cli

# Install system deps
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

WORKDIR /app
COPY . .

RUN chown -R www-data:www-data /app

EXPOSE 8080

CMD php -S 0.0.0.0:8080 -t public
