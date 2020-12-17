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
        } catch (\Exception $exception) {

            throw  new \Exception("Category Not Found", 404);
        }
    }
    public static function create(array $data)
    {
        try {
            $newCategory = new Category;
            $newCategory->description = isset($data['description']) ? $data['description'] : null;
            $newCategory->position = isset($data['position']) ? $data['position'] : null;
            $newCategory->restaurant_id = isset($data['restaurant_id']) ? $data['restaurant_id'] : null;
            $newCategory->restaurant_id = isset($data['restaurant_id']) ? $data['restaurant_id'] : null;
            return $newCategory->save();
        } catch (\Exception $e) {

            throw new \Exception("Create Category Error", 404);
        }
    }

    public static function update(array $data, $id)
    {
        $category = self::findById($id);
        try {
            //TODO CAMBIAR A CATEGORY
            $category->description = isset($data['description']) ? $data['description'] : null;
            $category->position = isset($data['position']) ? $data['position'] : null;
            $category->restaurant_id = isset($data['restaurant_id']) ? $data['restaurant_id'] : null;
            $category->restaurant_id = isset($data['restaurant_id']) ? $data['restaurant_id'] : null;
            $category->save();
        } catch (\Exception $e) {

            throw new \Exception("Update Category Error", 400);
        }
    }

    public static function delete($id)
    {
        $category =   self::findById($id);
        $category->delete();
    }


    //TODO  Implement get by id restourant

}
