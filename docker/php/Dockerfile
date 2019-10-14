FROM php:7.2-fpm
COPY php.ini /usr/local/etc/php/

RUN php -v



RUN apt update

RUN apt install -y git
RUN git --version

RUN apt install -y zip
RUN which zip
RUN apt install -y unzip


RUN apt install -y zlib1g-dev
RUN docker-php-ext-install zip
# RUN apt install -y php-zip

# mysql
RUN apt install -y default-mysql-client
RUN docker-php-ext-install pdo_mysql

# memcached
RUN apt install -y libmemcached-dev
RUN pecl install memcached-3.0.4
RUN docker-php-ext-enable memcached

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer -V

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin


# install laravel
RUN composer global require "laravel/installer"



# docker run などで使われるディレクトリを指定
WORKDIR /opt/src
