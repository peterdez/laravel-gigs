# Laravel Gigs App

Web application for managing gigs built with Laravel:

## Project Setup

1. Clone this repo
- git clone https://github.com/peterdez/laravel-gigs.git
2. Go into the project root
- cd laravel-gigs
3. Install Composer dependencies
- composer install
4. Copy .env.example file to .env file
- cp .env.example .env
5. Set the Application key
- php artisan key:generate
6. Setup the database credentials and migrate database with seeders
- php artisan migrate --seed
7. Install front-end dependencies
- npm install && npm run dev
8. Run server
- php artisan serve
9. Visit **localhost:8000/gigs** in your favorite browser

## Test User Accounts

1. Administrator
- Email Address: admin@test.com
- Password: Krystal

2. General User
- Email Address: krystal@test.com
- Password: Krystal
