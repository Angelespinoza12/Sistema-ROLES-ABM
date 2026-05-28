FROM php:8.2-apache

RUN apt-get update -y && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    zip \
    unzip \
    git \
    curl

RUN docker-php-ext-install pdo pdo_mysql

COPY . /var/www/html/

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80