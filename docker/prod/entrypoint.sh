#!/bin/sh

php artisan storage:link || true
service supervisor start
supervisorctl start "worker:*"
supervisorctl start "schedule"
php artisan migrate --force || true
php artisan db:seed --force || true
exec php artisan octane:frankenphp