#!/bin/bash

echo "Installing dependencies..."
composer install --no-dev --optimize-autoloader

echo "Setting up .env..."
cp .env.example .env

echo "Generating application key..."
php artisan key:generate

echo "Running migrations..."
php artisan migrate

echo "Seeding database..."
php artisan db:seed

echo "Setup complete! 🎉"
