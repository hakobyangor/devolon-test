<div style="font-size: 24px; text-align: center; margin-top: 30px">
    DEVOLON CODING EXERCISE
</div>

##Overview

This is a supermarket checkout test project for Develon Company, 

## Installation
For application installation please run this commands

    git clone https://github.com/clojerl/example-web-app
    composer update
    cp .env.example .env

    docker-compose build
    docker-compose up

From devolon_fpm_1 containers CLI run following commands
    
    cd  cd ../laravel-docker
    php artisan migrate 
    php artisan db:seed --class=ProductsSeeder

##Supported Urls

For add Product in basket
    
    /add-product/{basketGUID}/{productID} method: GET


For complete checkout process

    /checkout/complete-checkout/{basketGUID} method: GET

----

    Replace {productID} with one of numbers from 1 to 4
    Replace {basketGUID} with guid that matches ^[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}$

----

You can use postman for test application, find bellow postman collection shared url

    https://www.getpostman.com/collections/c11435d5454ce3b720c1
