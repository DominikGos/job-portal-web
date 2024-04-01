FROM php:fpm-alpine

WORKDIR /var/www/html

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN apk add --no-cache icu-dev \
    libzip-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install zip

COPY --from=composer:2.7.2 /usr/bin/composer /usr/bin/composer