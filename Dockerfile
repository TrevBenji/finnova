FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

COPY . .

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN cp .env.example .env \
 && echo "APP_KEY=base64:placeholderkey=" >> .env \
 && echo "DB_CONNECTION=mysql" >> .env \
 && echo "DB_DATABASE=finnova" >> .env \
 && echo "DB_USERNAME=root" >> .env \
 && echo "DB_PASSWORD=" >> .env \
 && echo "APP_URL=http://localhost" >> .env

RUN composer install --no-dev --optimize-autoloader || true

RUN php artisan config:clear \
 && php artisan key:generate \
 && php artisan config:cache || true

RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80