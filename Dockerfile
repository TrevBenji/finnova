FROM php:8.2-apache

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy Laravel app into container
COPY . .

# Set Apache to use the public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update Apache's config to point to public folder
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Install Composer (from official image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set up basic .env for build (replace at runtime)
RUN cp .env.example .env \
&& echo "APP_KEY=base64:ZccY7I0hsEiW7IGJ6JAL9jgc/l2TySLBFXocUhPAvuc=" >> .env \
 && echo "DB_CONNECTION=sqlite" >> .env \
 && echo "DB_DATABASE=/tmp/laravel.db" >> .env \
 && echo "SESSION_DRIVER=file" >> .env \
 && composer install --no-dev --optimize-autoloader \
 && php artisan key:generate \
 && php artisan config:cache || true

# Fix storage and cache permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80