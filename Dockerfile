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

# Evita warning Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# =========================
# COMPOSER
# =========================
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# =========================
# LARAVEL PUBLIC FOLDER
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
# DEPENDENCIAS LARAVEL
# =========================
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# =========================
# STORAGE + CACHE FIX
# =========================
RUN mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

# =========================
# LIMPIEZA LARAVEL (CRÍTICO)
# =========================
RUN php artisan optimize:clear || true
RUN php artisan config:clear || true
RUN php artisan route:clear || true
RUN php artisan view:clear || true

# =========================
# OPTIMIZACIÓN FINAL
# =========================
RUN php artisan config:cache || true

# =========================
# PERMISOS
# =========================
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80