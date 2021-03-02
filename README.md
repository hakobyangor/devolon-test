<div style="font-size: 24px; text-align: center; margin-top: 30px">
    DEVOLON CODING EXERCISE
</div>

## Overview

This is a supermarket checkout test project for Develon Company, 

## Installation
For the application installation please run the following commands

    git clone https://github.com/hakobyangor/devolon-test.git
    composer update
    cp .env.example .env

    docker-compose build
    docker-compose up

From devolon_fpm_1 containers CLI run following commands
    
    cd ../laravel-docker
    php artisan migrate 
    php artisan db:seed --class=ProductsSeeder

## Supported Urls

For adding Product in basket
    
    /add-product/{basketGUID}/{productID} method: GET


For completing checkout process

    /checkout/complete-checkout/{basketGUID} method: GET

----

    Replace {productID} with any number from 1 to 4
    Replace {basketGUID} with guid that matches /^[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}$/

----

You can use postman for testing the application, below you can find the postman collection shared URL

    https://www.getpostman.com/collections/c11435d5454ce3b720c1
