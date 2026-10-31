FROM php:8.3-apache

# 1. Instalar dependencias esenciales del sistema y extensiones de PHP para Laravel/Postgres
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    gnupg \
    && docker-php-ext-install pdo pdo_pgsql zip bcmath opcache

# 2. Instalar Node.js (NPM) usando el repositorio oficial de distribuciones binarias
RUN mkdir -p /etc/apt/keyrings \
    && curl -fsSL https://nodesource.com | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://nodesource.com nodistro main" | tee /etc/apt/sources.list.d/nodesource.list \
    && apt-get update && apt-get install nodejs -y

# 3. Instalar Composer desde su contenedor oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Configurar Apache para apuntar a la carpeta /public de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. Habilitar el módulo de reescritura de Apache para las rutas de Laravel
RUN a2enmod rewrite

# 6. Copiar los archivos del proyecto al contenedor
COPY . /var/www/html

# 7. Establecer los permisos necesarios para la caché y el almacenamiento de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 8. Configurar variables de Composer e instalar dependencias de backend y frontend (Vite)
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_PROCESS_TIMEOUT=2000

RUN composer config repositories.packagist composer https://packagist.org \
    && composer install --no-interaction --no-plugins --no-scripts --prefer-dist --no-dev --optimize-autoloader \
    && npm install \
    && npm run build

# 9. Script para ejecutar migraciones y luego iniciar Apache en producción
CMD php artisan migrate --force && apache2-foreground

# Exponer el puerto por defecto de Apache
EXPOSE 80
