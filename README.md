# Laravel 8 Example Application

## Setep

### Install Composer Dependencies

```code
composer install
```

### Create a copy of your .env file

```code
cp .env.example .env
```

### In the .env file, add database information to allow Laravel to connect to the database

We will want to allow Laravel to connect to the database that you just created in the previous step. To do this, we must add the connection credentials in the .env file and Laravel will handle the connection from there.

In the .env file fill in the *DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD* options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.


### Migrate the database

```code
php artisan migrate
```
