FROM php:8.2-apache

# Install PHP extensions
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

# Copy project files
COPY . .

# Add Composer binary
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader || exit 1

# Generate .env and app key
RUN cp .env.example .env \
 && echo "DB_CONNECTION=sqlite" >> .env \
 && echo "DB_DATABASE=/tmp/laravel.db" >> .env \
 && echo "SESSION_DRIVER=file" >> .env
 
# Fix permissions so Laravel can write logs
RUN chown -R www-data:www-data storage bootstrap/cache

# Create empty SQLite database
RUN touch /tmp/laravel.db \
 && chmod 666 /tmp/laravel.db

 COPY . .

# Laravel .env config
RUN cp .env.example .env \
 && echo "APP_ENV=production" >> .env \
 && echo "APP_DEBUG=false" >> .env \
 && echo "APP_KEY=base64:ZccY7I0hsEiW7IGJ6JAL9jgc/l2TySLBFXocUhPAvuc=" >> .env \
 && echo "DB_CONNECTION=sqlite" >> .env \
 && echo "DB_DATABASE=/tmp/laravel.db" >> .env \
 && echo "SESSION_DRIVER=file" >> .env \
 && echo "CACHE_DRIVER=file" >> .env

# Create the SQLite database and fix folder permissions
RUN touch /tmp/laravel.db \
 && chmod 666 /tmp/laravel.db \
 && mkdir -p storage/logs bootstrap/cache \
 && chown -R www-data:www-data storage bootstrap/cache

# Run Laravel setup
RUN php artisan key:generate \
 && php artisan config:clear \
 && php artisan cache:clear \
 && php artisan route:clear \
 && php artisan view:clear \
 && php artisan config:cache

# Fix permissions (corrected)
RUN mkdir -p bootstrap/cache storage \
 && chown -R www-data:www-data bootstrap/cache storage

# ✅ Run Laravel setup
RUN php artisan config:clear || true && \
    php artisan key:generate && \
    php artisan route:clear || true && \
    php artisan view:clear || true && \
    php artisan cache:clear || true && \
    php artisan config:cache || true

EXPOSE 80