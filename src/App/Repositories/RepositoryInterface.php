<?php


namespace App\Repositories;

interface RepositoryInterface
{

    public static function all();

    public static function create(array $data);

    public static function update(array $data, $id);

    public static function delete($id);

    public static function findById($id);
}
