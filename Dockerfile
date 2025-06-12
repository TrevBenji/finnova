FROM php:8.2-apache

# Install PHP extensions
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev sqlite3 libzip-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring bcmath exif gd

# Enable mod_rewrite
RUN a2enmod rewrite

# Set document root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www/html

# Copy app
COPY . .

# Add composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Create .env for local SQLite setup
RUN cp .env.example .env \
 && echo "APP_KEY=base64:ZccY7I0hsEiW7IGJ6JAL9jgc/l2TySLBFXocUhPAvuc=" >> .env \
 && echo "DB_CONNECTION=sqlite" >> .env \
 && echo "DB_DATABASE=/tmp/laravel.db" >> .env \
 && echo "SESSION_DRIVER=file" >> .env

# Generate app key and clear cache
RUN php artisan key:generate \
 && php artisan config:clear \
 && php artisan route:clear \
 && php artisan view:clear \
 && php artisan cache:clear \
 && php artisan config:cache

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80