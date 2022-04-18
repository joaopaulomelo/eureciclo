## About Project

Eureciclo is a system to import .txt data, you can also change a file, consult or include manually.

## Tools
 
- **[Tests with phpunit](https://phpunit.de/)** 
- **[Laravel Framework](https://laravel.com/)** 

## Config Project

you will need to run the docker-compose up command to upload the environment, feel free to change your docker settings.

## Run Project in Docker

- composer Install 
- php artisan key:generate
- php artisan migrate
- php artisan test

## ALL

Searchs, Delete, Edit and register in endpoints:

-  GET 'api/v1/purchase'
-  GET 'api/v1/purchase/{id}'
-  POST 'api/v1/purchase'
-  PUT 'api/v1/purchase/{id}'
-  DELETE 'api/v1/purchase/{id}'
-  POST 'api/v1/file/update'

Tests

- PurchaseHistoryTest
