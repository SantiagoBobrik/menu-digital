<?php


#Define containers
$container->set('ProductController', function ($c) {
    return new App\Controllers\ProductController();
});

$container->set('RestaurantController', function ($c) {
    return new App\Controllers\RestaurantController();
});