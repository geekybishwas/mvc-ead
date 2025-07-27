#!/bin/sh

# Default to port 8000 if PORT is not set
PORT=${PORT:-8000}

php artisan migrate --force
php artisan serve --host=0.0.0.0 --port=${PORT}
