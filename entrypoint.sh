#!/bin/sh

DB_HOST=${DB_HOST:-db}
DB_PORT=${DB_PORT:-3306}
REDIS_HOST=${REDIS_HOST:-redis}
REDIS_PORT=${REDIS_PORT:-6379}

while ! (nc -z "$DB_HOST" "$DB_PORT" && nc -z "$REDIS_HOST" "$REDIS_PORT"); do
  sleep 0.5
done

php artisan config:cache
php artisan route:cache
php artisan migrate --force

exec php-fpm
