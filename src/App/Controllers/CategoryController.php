<?php


namespace App\Controllers;

use App\Helper\JsonResponse;
use App\Models\Category;
use App\Repositories\CategoryRespository;

class CategoryController
{


    public function test($request =  null, $response = null, array $args = null)
    {

        return JsonResponse::withJson($response, 200, Category::all());
    }


    public function updateCategory($request =  null, $response = null, array $args = null)
    {
        CategoryRespository::update($request->getParsedBody(), $args['categoryId']);
        return JsonResponse::withJson($response, 200);
    }


    public function createCategory($request =  null, $response = null, array $args = null)
    {
        CategoryRespository::create($request->getParsedBody());
        return JsonResponse::withJson($response, 200);
    }
}
