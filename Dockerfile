FROM php:8.2-apache

# Install system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy Laravel project
COPY . .

# Install Composer (from Composer image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Create a fallback .env file
RUN cp .env.example .env \
 && echo "APP_KEY=base64:placeholderkey=" >> .env \
 && echo "DB_CONNECTION=mysql" >> .env \
 && echo "DB_DATABASE=finnova" >> .env \
 && echo "DB_USERNAME=root" >> .env \
 && echo "DB_PASSWORD=" >> .env \
 && echo "APP_URL=http://localhost" >> .env

# Install dependencies and prepare Laravel
RUN composer install --no-dev --optimize-autoloader || true
RUN php artisan config:clear \
 && php artisan key:generate \
 && php artisan config:cache || true

# Fix file permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80