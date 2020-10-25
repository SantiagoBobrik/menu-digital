<?php

use DI\Container;
use Slim\Factory\AppFactory;

//error_reporting(E_ALL);
//ini_set('display_errors', true);
//ini_set('display_startup_errors', true);

require __DIR__ . '/../vendor/autoload.php';
#Create Container
AppFactory::setContainer(new \DI\Container);

#Create App
$app = AppFactory::create();
$app->addBodyParsingMiddleware();
#Get Container
$container = $app->getContainer();

/* --------------------------- Database Connection With Eloquent  ---------------- */
require __DIR__ . '/../src/connection.php';

/* ------------------------------ Get Dependencies ------------------------------ */
require __DIR__ . '/../src/dependencies.php';

/* ----------------------------- Get Routes ------------------------------------- */
require __DIR__ . '/../src/App/Routes/productRoutes.php';
require __DIR__ . '/../src/App/Routes/restaurantRoutes.php';

$app->run();
