# Etapa 1: Node (solo para herramientas frontend)
FROM node:24 as nodebuilder

WORKDIR /app

COPY package*.json ./

RUN npm install

# Etapa 2: PHP + Laravel
FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    && docker-php-ext-install pdo pdo_mysql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Nota: no copiamos archivos aquí porque los montaremos como volumen

# Permisos recomendados
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html
