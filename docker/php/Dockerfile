FROM php:8.1-fpm

COPY php.ini /usr/local/etc/php/

# 必要なライブラリを追加
RUN apt update \
  && apt install -y \
  default-mysql-client \
  zlib1g-dev \
  libzip-dev \
  unzip \
  libjpeg-dev \
  libpng-dev \
  libwebp-dev \
  libfreetype6-dev

# GD 拡張の有効化（PHP 8.1 用）
RUN docker-php-ext-configure gd \
  --with-freetype \
  --with-jpeg \
  --with-webp

# 必要な PHP 拡張のインストール@
RUN docker-php-ext-install \
  pdo_mysql \
  zip \
  gd

# Composer インストール
RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && composer self-update

WORKDIR /var/www
