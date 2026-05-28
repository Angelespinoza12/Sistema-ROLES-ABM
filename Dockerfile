FROM php:8.2-apache

RUN apt-get update -y && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    zip \
    unzip \
    git \
    curl

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

COPY . .

# instalar dependencias
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# 🔥 FIX CRÍTICO LARAVEL
RUN mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

# limpiar cache por si acaso
RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan route:clear || true

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80