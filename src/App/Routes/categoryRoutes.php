<?php


$app->group("/categories", function ($app) {

    $app->post('', 'CategoryController:createCategory');
    $app->put('/{categoryId}', 'CategoryController:updateCategory');
});
