# 1. Usar una imagen oficial de Node para obtener los binarios limpios
FROM node:20-slim AS node_base

# 2. Iniciar con nuestra imagen oficial de PHP con Apache
FROM php:8.3-apache

# 3. Copiar Node.js y NPM directamente desde la imagen base de Node anterior
COPY --from=node_base /usr/local/bin/node /usr/local/bin/node
COPY --from=node_base /usr/local/lib/node_modules /usr/local/lib/node_modules
RUN ln -s /usr/local/bin/node /usr/local/bin/nodejs && \
    ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm

# 4. Instalar dependencias esenciales del sistema y extensiones de PHP para Laravel y Postgres
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql zip bcmath opcache

# 5. Instalar Composer desde su contenedor oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Configurar Apache para apuntar correctamente a la carpeta /public de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 7. Habilitar el módulo de reescritura de Apache para las rutas de Laravel
RUN a2enmod rewrite

# 8. Copiar los archivos del proyecto al contenedor de producción
COPY . /var/www/html

# 9. Establecer permisos requeridos para la caché y almacenamiento de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 10. Configurar variables de Composer e instalar dependencias de Backend y Frontend (Vite)
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_PROCESS_TIMEOUT=3000

RUN composer config repositories.packagist composer https://packagist.org \
    && composer install --no-interaction --no-plugins --no-scripts --prefer-dist --no-dev --optimize-autoloader \
    && npm install \
    && npm run build

# 11. Script para ejecutar las migraciones automáticas y arrancar Apache
CMD php artisan migrate --force && apache2-foreground

# Exponer el puerto por defecto de Apache
EXPOSE 80
