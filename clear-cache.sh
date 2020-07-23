#!/usr/bin/env bash

php artisan clear-compiled
php artisan cache:clear
php artisan config:clear
php artisan event:clear
php artisan optimize:clear
php artisan route:clear
php artisan view:clear

composer dump-autoload

php artisan ide-helper:generate
php artisan ide-helper:meta
php artisan ide-helper:models --write --reset