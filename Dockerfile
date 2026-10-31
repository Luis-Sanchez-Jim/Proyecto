FROM php:8.3-apache

# 1. Instalar dependencias del sistema y extensiones de PHP necesarias para Laravel y Postgres
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql zip bcmath opcache

# 2. Instalar Composer desde su contenedor oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Configurar Apache para apuntar correctamente a la carpeta /public de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 4. Habilitar el módulo de reescritura de Apache para las rutas de Laravel (.htaccess)
RUN a2enmod rewrite

# 5. Copiar los archivos del proyecto al servidor
COPY . /var/www/html

# 6. Establecer permisos correctos para que Laravel pueda escribir logs y caché
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 7. Configurar variables de Composer e instalar dependencias de producción
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist --no-dev --optimize-autoloader

# 8. Render expone el puerto 80 por defecto en contenedores Apache tradicionales
EXPOSE 80
