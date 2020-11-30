<?php


$app->group("/categories", function ($app) {

    $app->get('', 'CategoryController:test');
});
