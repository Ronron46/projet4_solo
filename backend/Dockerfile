FROM php:apache

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git && \
    apt-get install -y zip

RUN docker-php-ext-install pdo pdo_mysql

COPY ./composer.phar /bin/composer
COPY ./000-default.conf /etc/apache2/sites-enabled/000-default.conf

RUN a2enmod rewrite

CMD sh ronrun.sh