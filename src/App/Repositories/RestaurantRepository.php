<?php

namespace App\Repositories;

use App\Models\Restaurant;

class RestaurantRepository implements RepositoryInterface
{

    public static function all()
    {
        return Restaurant::all();
    }

    public static function findById($id)
    {

        $restaurant = Restaurant::find($id);

        if (is_null($restaurant))
            throw new \Exception("Restaurant Not Found", 404);

        return $restaurant;

    }

    public static function create(array $data)
    {
        try {
            $newRestaurant = new Restaurant;
            $newRestaurant->name = isset($data['name']) ? $data['name'] : null;
            $newRestaurant->user_id = isset($data['user_id']) ? $data['user_id'] : null;;
            return $newRestaurant->save();
        } catch (\Exception $e) {

            throw new \Exception("Create Restaurant Error", 400);
        }

    }

    public static function update(array $data, $id)
    {
        $restaurant = self::findById($id);
        if (is_null($restaurant)) {
            throw new \Exception("Restaurant Not Found", 404);
        }

        try {
            $restaurant->name = isset($data['name']) ? $data['name'] : null;
            $restaurant->user_id = isset($data['user_id']) ? $data['user_id'] : null;
            return $restaurant->save();

        } catch (\Exception $e) {
            throw new \Exception("Update Restaurant Error", 400);
        }
    }

    public static function delete($id)
    {
        $restaurant = Restaurant::find($id);

        if (is_null($restaurant)) throw new \Exception("Restaurant Not Found", 404);

        return $restaurant->delete();


    }

}
