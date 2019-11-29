FROM composer:1.9.1 as composer
FROM php:7.2.24-fpm-alpine3.10

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

RUN apk --update --no-cache add bash make py2-pip && \
    pip install google_images_download==2.8.0

WORKDIR /usr/local/src

COPY ./src /usr/local/src

RUN composer install
