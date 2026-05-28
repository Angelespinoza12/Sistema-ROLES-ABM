FROM php:8.2-apache

# =========================
# DEPENDENCIAS DEL SISTEMA
# =========================
RUN apt-get update -y && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    zip \
    unzip \
    git \
    curl

# =========================
# EXTENSIONES PHP
# =========================
RUN docker-php-ext-install pdo pdo_mysql

# =========================
# APACHE REWRITE (LARAVEL)
# =========================
RUN a2enmod rewrite

# =========================
# COMPOSER
# =========================
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# =========================
# DOCUMENT ROOT (LARAVEL)
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
# DEPENDENCIAS PHP
# =========================
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# =========================
# LARAVEL FIXES
# =========================
RUN mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache

RUN chmod -R 777 storage bootstrap/cache

# =========================
# CACHE (evitar errores 500)
# =========================
RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan route:clear || true
RUN php artisan view:clear || true
RUN php artisan optimize:clear || true
RUN php artisan config:cache || true

# =========================
# PERMISOS FINALES
# =========================
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80