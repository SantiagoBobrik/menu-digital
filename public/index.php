<?php

use DI\Container;
use Slim\Factory\AppFactory;
//error_reporting(E_ALL);
//ini_set('display_errors', true);
//ini_set('display_startup_errors', true);
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
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

/* ------------------------------ Middlewares ------------------------------ */
require  __DIR__. '/../src/App/Middlewares/ExceptionMiddleware.php';

/* ----------------------------- Get Routes ------------------------------------- */
require __DIR__ . '/../src/App/Routes/productRoutes.php';
require __DIR__ . '/../src/App/Routes/restaurantRoutes.php';
require __DIR__ . '/../src/App/Routes/categoryRoutes.php';



$app->run();
