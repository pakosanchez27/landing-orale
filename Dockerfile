# Usamos PHP 8.3 con FPM (FastCGI Process Manager)
FROM php:8.3-fpm

# Definir el directorio de trabajo
WORKDIR /var/www

# 1. Instalar dependencias del sistema y herramientas necesarias
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nano

# 2. Instalar Node.js (Versión 20 LTS) para Vite
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# 3. Limpiar caché del sistema para reducir tamaño de imagen
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# 4. Instalar extensiones de PHP requeridas por Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# 5. Instalar Composer (Copiando el binario oficial)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Copiar los archivos del proyecto al contenedor
COPY . /var/www

# 7. Configurar permisos para el usuario www-data (el que usa el servidor web)
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

# Exponer el puerto de PHP-FPM y el puerto de Vite
EXPOSE 9000
EXPOSE 5173

# Comando por defecto
CMD ["php-fpm"]
