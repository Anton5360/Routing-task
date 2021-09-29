FROM php:8.0-fpm

WORKDIR /var/www

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


EXPOSE 9000
CMD ["php-fpm"]
