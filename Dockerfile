FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    zip unzip git \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_pgsql pgsql bcmath zip gd intl xml opcache