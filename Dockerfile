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
# APACHE
# =========================
RUN a2enmod rewrite
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# =========================
# COMPOSER
# =========================
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# =========================
# WORKDIR
# =========================
WORKDIR /var/www/html

# =========================
# COPIAR PROYECTO
# =========================
COPY . .

# =========================
# STORAGE
# =========================
RUN mkdir -p bootstrap/cache \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views

RUN chmod -R 777 bootstrap/cache storage

# =========================
# COMPOSER INSTALL
# =========================
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# =========================
# LIMPIAR CACHE
# =========================
RUN php artisan optimize:clear || true
RUN php artisan config:clear || true
RUN php artisan route:clear || true
RUN php artisan view:clear || true

# =========================
# PERMISOS
# =========================
RUN chown -R www-data:www-data /var/www/html

# =========================
# APACHE ROOT
# =========================
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf

RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# =========================
# PUERTO
# =========================
EXPOSE 80

# =========================
# START APP
# =========================
CMD php artisan migrate:fresh --seed --force && apache2-foreground