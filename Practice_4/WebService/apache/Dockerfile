FROM php:7.4.3-apache
WORKDIR /var/www/html/
COPY . .

RUN apt-get update &&\
    apt-get install -y libaprutil1-dbd-mysql &&\
    a2enmod authn_dbd &&\
    a2enmod authn_socache &&\
    docker-php-ext-install mysqli &&\
    service apache2 restart &&\
    a2enmod rewrite &&\
    service apache2 restart
