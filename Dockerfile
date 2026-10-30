FROM dunglas/frankenphp:1-php8.3

# Instalar extensiones necesarias para PostgreSQL y Laravel
RUN install-php-extensions \
    pdo_pgsql \
    bcmath \
    intl \
    zip \
    opcache

# Instalar Composer de forma automática desde su contenedor oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar el código del proyecto
COPY . /app

# Establecer variables para Composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Instalar dependencias de PHP
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist --no-dev --optimize-autoloader

# Configurar permisos requeridos
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Puerto por el que escucha FrankenPHP
EXPOSE 8080
