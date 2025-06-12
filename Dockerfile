FROM php:8.2-apache

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set Apache public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www/html

# Copy project into container
COPY . .

# Add Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy .env and set basic env variables
RUN cp .env.example .env \
 && echo "APP_KEY=base64:ZccY7I0hsEiW7IGJ6JAL9jgc/l2TySLBFXocUhPAvuc=" >> .env \
 && echo "DB_CONNECTION=sqlite" >> .env \
 && echo "DB_DATABASE=/tmp/laravel.db" >> .env \
 && echo "SESSION_DRIVER=file" >> .env

# Install composer dependencies
RUN composer install --no-dev --optimize-autoloader || exit 1

# Run artisan setup tasks
RUN php artisan key:generate \
 && php artisan config:clear \
 && php artisan cache:clear \
 && php artisan route:clear \
 && php artisan view:clear \
 && php artisan config:cache || true

 #Check if vendor exists
RUN ls -la /var/www/html/vendor || echo "Vendor folder not found"

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80