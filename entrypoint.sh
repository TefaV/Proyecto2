#!/bin/bash

# Esperar a que la base de datos esté lista (si fuera necesario)
sleep 10  # Espera 10 segundos antes de continuar

# Generar la clave de la aplicación
php artisan key:generate --force

# Optimizar la configuración
php artisan optimize

# Ejecutar las migraciones
php artisan migrate --force

# Ejecutar los seeders
php artisan db:seed --force

# Iniciar Apache en primer plano
exec "$@"
