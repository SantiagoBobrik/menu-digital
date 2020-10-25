<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
use App\Helper\JsonResponse;

$app->add(function (Request $request, RequestHandler $handler) {
    try {
        return $handler->handle($request);
    } catch (Exception $exception) {
        $response = new Response();
        $code = $exception->getCode() ? $exception->getCode() : 200;
        return JsonResponse::withJson($response, $code, $exception->getMessage());
    }
});