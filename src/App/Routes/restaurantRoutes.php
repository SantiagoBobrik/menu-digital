<?php


$app->group("/restaurants", function ($app) {

    $app->get('', 'RestaurantController:getAllRestaurants');
    $app->get('/{restaurantId}','RestaurantController:getRestaurantById');
    $app->post('', 'RestaurantController:createRestaurant');
    $app->put('/{restaurantId}','RestaurantController:updateRestaurantById');
    $app->delete('/{restaurantId}','RestaurantController:deleteRestaurantById');

});
