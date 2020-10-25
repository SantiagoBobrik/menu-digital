<?php


namespace App\Controllers;

use App\Helper\JsonResponse;
use App\Repositories\RestaurantRepository;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\Restaurant;

class RestaurantController
{
    public function getAllRestaurants($request = null, $response = null, array $args = null)
    {
        return JsonResponse::withJson($response, 200, RestaurantRepository::all());
    }


    public function getRestaurantById($request = null, $response = null, array $args = null)
    {

        $restaurant = RestaurantRepository::findById($args['restaurantId']);
        if (empty($restaurant))
            return JsonResponse::withJson($response, 404);

        return JsonResponse::withJson($response, 200, $restaurant);

    }

    public function createRestaurant($request = null, $response = null, array $args = null)
    {

        $newRestaurant = RestaurantRepository::create($request->getParsedBody());

        if (!$newRestaurant)
            return JsonResponse::withJson($response, 500);

        return JsonResponse::withJson($response, 201);

    }

    public function updateRestaurantById($request = null, $response = null, array $args = null)
    {
        $isUpdateRestaurant = RestaurantRepository::update($request->getParsedBody(), $args['restaurantId']);
        if (!$isUpdateRestaurant)
            return JsonResponse::withJson($response, 400);

        return JsonResponse::withJson($response, 200);

    }

    public function deleteRestaurantById($request = null, $response = null, array $args = null)
    {

        $isDeleteRestaurant = RestaurantRepository::delete($args['restaurantId']);

        if (!$isDeleteRestaurant)
            return JsonResponse::withJson($response, 400, $isDeleteRestaurant);

        return JsonResponse::withJson($response, 200);

    }

}
