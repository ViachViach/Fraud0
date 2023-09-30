FROM php:8-fpm-alpine

RUN set -xe && apk update && apk add --no-cache \
    libzip \
    bash \
    curl \
    imagemagick-dev \
    libmcrypt \
    libmcrypt-dev \
    libxml2-dev \
    pcre-dev \
    git \
    autoconf \
    g++ \
    make \
    icu-dev \
    libzip-dev libmcrypt-dev libsodium libsodium-dev oniguruma oniguruma-dev \
    protoc linux-headers postgresql-dev openssh-client zlib-dev \
    && pecl install xdebug-3.2.2 \
    && docker-php-ext-enable xdebug \

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN alias composer='php /usr/local/bin/composer'

COPY xdebug.ini  /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
COPY php.ini /usr/local/etc/php/conf.d/php.ini

WORKDIR /var/www
