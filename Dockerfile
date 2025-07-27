# Etapa 1: Node (basado en Debian, no Alpine)
FROM node:18 as nodebuilder

WORKDIR /app

COPY package*.json ./

# Eliminar node_modules y lock si existen para forzar una instalación limpia
RUN rm -rf node_modules package-lock.json

# Instalar dependencias normalmente
RUN npm install

# Copiar el resto del proyecto
COPY . .

# Ejecutar build de Vite
RUN npm run build

# Etapa 2: PHP + Laravel
FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .
COPY --from=nodebuilder /app/public/build ./public/build

RUN composer install

RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html
