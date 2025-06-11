FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy all project files into the container
COPY . .

# Set Apache to serve the Laravel public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update Apache config to use new document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set up .env and Laravel config
RUN cp .env.example .env \
 && echo "APP_KEY=base64:placeholder" >> .env \
 && echo "DB_CONNECTION=mysql" >> .env \
 && echo "DB_DATABASE=finnova" >> .env \
 && echo "DB_USERNAME=root" >> .env \
 && echo "DB_PASSWORD=" >> .env \
 && composer install --optimize-autoloader --no-dev \
 && php artisan key:generate \
 && php artisan config:cache || true

# Fix permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80