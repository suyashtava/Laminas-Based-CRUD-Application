FROM php:7.4-apache

RUN apt-get update \
 && apt-get install -y git zlib1g-dev libzip-dev \
 && docker-php-ext-install zip \
 && apt-get install -y libicu-dev \
 && docker-php-ext-configure intl \
 && docker-php-ext-install intl \
 && docker-php-ext-enable intl \
 && docker-php-ext-install pdo pdo_mysql mysqli \
 && docker-php-ext-enable mysqli \
 && docker-php-ext-enable pdo \
 && docker-php-ext-enable pdo_mysql \
 && a2enmod rewrite \
 && sed -i 's!/var/www/html!/var/www/public!g' /etc/apache2/sites-available/000-default.conf \
 && mv /var/www/html /var/www/public \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer


WORKDIR /var/www
