## How to Setup this project
This is a Laravel 9 project, php vesion of 8.0 or higher is required to be installed in your machine.
Clone the repository

```
git clone https://github.com/devsahm/estate-intel.git
```

Install composer

```
composer install
```

Create .env file and Copy the content of .env.example to .env

```
touch .env
cp .env.example .env
```

Setup the database, by filling the appropriate data within the env like so

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=estate_intel
DB_USERNAME=root
DB_PASSWORD=

```

Migrate the database 

```
php artisan migrate
```

Run the test

```
php artisan test
```


