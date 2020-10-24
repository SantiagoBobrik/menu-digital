<?php


$app->group("/product", function ($app) {

    $app->get('', 'ProductController:test');
});
