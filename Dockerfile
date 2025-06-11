FROM php:8.2-apache

# Install system packages
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy Laravel files
COPY . .

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Ensure .env exists (minimal version to prevent errors)
RUN cp .env.example .env \
 && echo "APP_KEY=base64:placeholderkey=" >> .env \
 && echo "DB_CONNECTION=mysql" >> .env \
 && echo "DB_DATABASE=finnova" >> .env \
 && echo "DB_USERNAME=root" >> .env \
 && echo "DB_PASSWORD=" >> .env \
 && echo "APP_URL=http://localhost" >> .env

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader || true

# Generate Laravel key and cache config
RUN php artisan config:clear \
 && php artisan key:generate \
 && php artisan config:cache || true

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80