<?php


namespace App\Controllers;

use App\Helper\JsonResponse;
use App\Repositories\RestaurantRepository;

class RestaurantController
{
    public function getAllRestaurants($request = null, $response = null, array $args = null)
    {

        return JsonResponse::withJson($response, 200, RestaurantRepository::all());
    }


    public function getRestaurantById($request = null, $response = null, array $args = null)
    {
        return JsonResponse::withJson($response, 200, RestaurantRepository::findById($args['restaurantId']));
    }

    public function createRestaurant($request = null, $response = null, array $args = null)
    {

        RestaurantRepository::create($request->getParsedBody());

        return JsonResponse::withJson($response, 201);
    }

    public function updateRestaurantById($request = null, $response = null, array $args = null)
    {
        RestaurantRepository::update($request->getParsedBody(), $args['restaurantId']);
        return JsonResponse::withJson($response, 200);
    }

    public function deleteRestaurantById($request = null, $response = null, array $args = null)
    {
        RestaurantRepository::delete($args['restaurantId']);
        return JsonResponse::withJson($response, 200);
    }
}
