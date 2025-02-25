
# What is inside.
- Laravel v11.x
- PHP v8.3.x
- MySQL v8.1.x (default)
- MariaDB v10.11
- PostgreSQL v16.x
- pgAdmin v4.x
- phpMyAdmin v5.x
- Mailpit v1.x
- Node.js v18.x
- NPM v10.x
- Yarn v1.x
- Vite v5.x
- Rector v1.x
- Redis v7.2.x

# Requirements
- Stable version of [Docker](https://docs.docker.com/engine/install/)
- Compatible version of [Docker Compose](https://docs.docker.com/compose/install/#install-compose)

# How To Deploy

### For first time only !
- `git clone https://github.com/nvhdangdw/takaiExercise.git`
- `cd takaiExercise`
- `docker compose up -d --build`
- `docker compose exec phpmyadmin chmod 777 /sessions`
- `docker compose exec php bash`
- `chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache`
- `chmod -R 775 /var/www/storage /var/www/bootstrap/cache`
- `composer setup`

### From the second time
- `docker compose up -d`

### Start the Application
- `docker compose exec php bash`
- `php artisan migrate`
- `php artisan db:seed`
- `php artisan optimize:clear`
- `php artisan serve`


### Laravel App
- URL: http://localhost

### phpMyAdmin
- URL: http://localhost:8080
- Server: `db`
- Username: `nvhdang`
- Password: `nvhdang`
- Database: `excel_import`

### Adminer
- URL: http://localhost:9090
- Server: `db`
- Username: `nvhdang`
- Password: `nvhdang`
- Database: `excel_import`

### Primary Documentation 
https://trello.com/c/6yYsFJp0


