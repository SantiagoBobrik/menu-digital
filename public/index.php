<?php

use DI\Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';


#Create Container
AppFactory::setContainer(new \DI\Container);

#Create App
$app = AppFactory::create();

#Get Container
$container = $app->getContainer();

/* --------------------------- Database Connection With Eloquent  ---------------- */
require __DIR__ . '/../src/connection.php';

/* ------------------------------ Get Dependencies ------------------------------ */
require __DIR__ . '/../src/dependencies.php';

/* ----------------------------- Get Routes ------------------------------------- */
require __DIR__ . '/../src/App/Routes/productRoutes.php';

$app->run();
