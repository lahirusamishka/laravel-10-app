FROM php:8.1.17-fpm-alpine3.17

# Install dependencies
RUN apk add --no-cache \
    build-base \
    curl \
    git \
    oniguruma-dev \
    openssl-dev \
    zlib-dev \
    libzip-dev \
    libpng-dev \
    libxml2-dev \
    freetype-dev

# Install PHP extensions
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    zip \
    exif \
    pcntl \
    bcmath \
    gd \
    opcache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy source code
# COPY . .

# Install dependencies with Composer
# RUN composer install --no-interaction --no-dev --prefer-dist

# Generate key
# RUN php artisan key:generate

# Set permissions
# RUN chown -R www-data:www-data /var/www/html
# RUN chmod -R 755 /var/www/html/storage

# Expose port
# EXPOSE 9000

# Start PHP-FPM
# CMD ["php-fpm"]