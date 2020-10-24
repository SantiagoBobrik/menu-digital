<?php


#Define containers
$container->set('ProductController', function ($c) {
    return new App\Controllers\ProductController();
});
