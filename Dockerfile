FROM php:7.4-apache

RUN docker-php-ext-install mysqli

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip \
    git
RUN docker-php-ext-install zip

RUN a2enmod rewrite

RUN service apache2 restart

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./composer.json /var/www/composer.json

WORKDIR /var/www/

RUN composer install
