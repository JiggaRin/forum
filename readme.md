# Simple forum on Laravel

Using PHP - v.7.4.6.

Using Laravel - v.7.13.0.

## Getting Started

1. Copy `.env.example` and rename to `.env`. See the dev environment file database configuration below.
 
 2. Run `npm install`.
 
 3. Run `composer install` for installing dependencies.
 
 4. Run  `php artisan key:generate` for generating keys for database access. 
 
 5. Run  `php artisan migrate:refresh --seed` for migrating and seeding the database.
 
 6. Run `php artisan serve` for navigating to:
 http://127.0.0.1:8000/

### Dev Environment Configurations

**Database**

*DB_CONNECTION=mysql

*DB_HOST=127.0.0.1

*DB_PORT=3306

*DB_DATABASE=forum

*DB_USERNAME=root

*DB_PASSWORD=1488


**Redis**

*REDIS_HOST=127.0.0.1

*REDIS_PASSWORD=null

*REDIS_PORT=6379
