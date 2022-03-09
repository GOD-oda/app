FROM php:8.1.3-fpm

ENV COMPOSER_ALLOW_SUPERUSER=1 \
	COMPOSER_HOME=/composer

COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
    apt-get -y install git zip unzip

WORKDIR /var/www/html

COPY . .

RUN composer install && \
    chmod -R 777 storage bootstrap/cache
