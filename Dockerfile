# Usa imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev zip unzip git curl libonig-dev libxml2-dev sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite mbstring gd

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia todos los archivos del proyecto
COPY . .

# Copiar archivo .env si no existe
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Instalar dependencias
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --optimize-autoloader

# Generar clave de aplicación
RUN php artisan key:generate

# Crear base de datos SQLite y dar permisos
RUN mkdir -p storage/logs database \
    && touch database/database.sqlite \
    && chown -R www-data:www-data storage bootstrap/cache database \
    && chmod -R ug+rwx storage bootstrap/cache database

# Configurar Apache para servir desde /public
RUN echo '<VirtualHost *:80>' > /etc/apache2/sites-available/000-default.conf \
    && echo '    DocumentRoot /var/www/html/public' >> /etc/apache2/sites-available/000-default.conf \
    && echo '    <Directory /var/www/html/public>' >> /etc/apache2/sites-available/000-default.conf \
    && echo '        AllowOverride All' >> /etc/apache2/sites-available/000-default.conf \
    && echo '        Require all granted' >> /etc/apache2/sites-available/000-default.conf \
    && echo '    </Directory>' >> /etc/apache2/sites-available/000-default.conf \
    && echo '</VirtualHost>' >> /etc/apache2/sites-available/000-default.conf

# Habilitar módulos de Apache
RUN a2enmod rewrite headers

# Exponer el puerto 80
EXPOSE 80

# Comando de arranque
CMD php artisan migrate --force && php artisan db:seed --force && apache2-foreground
