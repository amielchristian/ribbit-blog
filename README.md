# Ribbit

Microblogging app built with Laravel and MySQL.

### Setup

1. Depending on your database of choice, create the `.env` file from one of the example files.
2. Install `php` and `composer`. In macOS, this is as simple as `brew install php composer`.
3. Install `composer` packages with `composer install`.
4. Install `npm` packages with `npm i`.
5. Run `php artisan key:generate` to generate the application's unique key.
6. Run `php artisan migrate` to run the database migrations.
7. Run `npm run dev` and `php artisan serve` simultaneously. Alternatively, simply build the static files with `npm run build` before running the Laravel server.
