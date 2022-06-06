FROM php:8.0-apache 

COPY ./webserver /var/www/html

RUN docker-php-ext-install mysqli