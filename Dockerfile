FROM php:8.0.5-fpm

RUN apt-get update && \
    apt-get install -y vim git zip unzip && \
    apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.discover_client_host=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer