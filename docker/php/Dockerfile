FROM php:8.3-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    bash \
    sudo \
    autoconf \
    build-essential \
    libicu-dev \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libxpm-dev \
    libzip-dev \
    libxml2-dev \
    libmagickwand-dev \
    libpq-dev \
    libfreetype6-dev \
    libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install \
        intl \
        bcmath \
        opcache \
        pdo \
        pdo_pgsql \
        zip \
        mbstring \
        gd

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get install -y imagemagick

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

EXPOSE 9000


CMD ["php-fpm"]