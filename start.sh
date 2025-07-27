#!/bin/sh

# Set a default port (Railway provides one via $PORT)
PORT=${PORT:-8000}

# Ensure storage and cache permissions are set correctly
php artisan config:cache
php artisan route:cache
php artisan migrate --force

# Start Laravel’s built-in PHP server
php artisan serve --host=0.0.0.0 --port=$PORT
