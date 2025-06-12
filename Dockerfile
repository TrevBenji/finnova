FROM php:8.2-apache

# Install system packages
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libsqlite3-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring bcmath exif gd

# Enable Apache rewrite
RUN a2enmod rewrite

# Set Laravel public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www/html

# Copy project files once
COPY . .

# Add Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install dependencies
RUN composer install --no-dev --optimize-autoloader || exit 1

# Create SQLite DB
RUN touch /tmp/laravel.db && chmod 666 /tmp/laravel.db

# Set up .env file ONCE
RUN cp .env.example .env && \
    echo "APP_ENV=production" >> .env && \
    echo "APP_DEBUG=false" >> .env && \
    echo "APP_KEY=base64:ZccY7I0hsEiW7IGJ6JAL9jgc/l2TySLBFXocUhPAvuc=" >> .env && \
    echo "DB_CONNECTION=sqlite" >> .env && \
    echo "DB_DATABASE=/tmp/laravel.db" >> .env && \
    echo "SESSION_DRIVER=file" >> .env && \
    echo "CACHE_DRIVER=file" >> .env

# Create storage dirs and fix permissions
RUN mkdir -p storage/logs bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache

# Create SQLite DB and log folder
RUN touch /tmp/laravel.db && chmod 666 /tmp/laravel.db && \
    mkdir -p storage/logs bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache

# Run Laravel Artisan commands with fallback
RUN php artisan config:clear || true && \
    php artisan key:generate || true && \
    php artisan route:clear || true && \
    php artisan view:clear || true && \
    php artisan cache:clear || true && \
    php artisan config:cache || true

EXPOSE 80