FROM php:8.2-apache

# =========================
# DEPENDENCIAS
# =========================
RUN apt-get update -y && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    zip \
    unzip \
    git \
    curl

# =========================
# PHP EXTENSIONS
# =========================
RUN docker-php-ext-install pdo pdo_mysql

# =========================
# APACHE REWRITE
# =========================
RUN a2enmod rewrite

# =========================
# COMPOSER
# =========================
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# =========================
# LARAVEL PUBLIC
# =========================
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# =========================
# PROYECTO
# =========================
WORKDIR /var/www/html
COPY . .

# =========================
# DEPENDENCIAS
# =========================
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# =========================
# STORAGE FIX
# =========================
RUN mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

# =========================
# LARAVEL CACHE CLEAN
# =========================
RUN php artisan optimize:clear || true
RUN php artisan config:cache || true

# =========================
# PERMISOS
# =========================
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80