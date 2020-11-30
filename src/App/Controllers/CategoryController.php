<?php


namespace App\Controllers;
use App\Helper\JsonResponse;
use App\Models\Category;
class CategoryController
{


public function test($request =  null, $response = null, array $args = null){

    return JsonResponse::withJson($response, 200, Category::all());
    
}
}