<?php


namespace App\Repositories;


use App\Models\Category;

class CategoryRespository implements RepositoryInterface
{

    public static function all()
    {
      return Category::all();
    }

    public static function findById($id)
    {
        try {
            return Category::findOrFail($id);

        }catch (\Exception $exception){

            throw  new \Exception("Category Not Found", 404);
        }
    }
    public static function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public static function update(array $data, $id)
    {
        // TODO: Implement update() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }


}