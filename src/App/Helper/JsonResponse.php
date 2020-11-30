<?php


namespace App\Helper;

use Psr\Http\Message\ResponseInterface as Response;


class JsonResponse
{

    const  STATUS_CODES = [200, 201, 204, 400, 401, 403, 404, 500, 503];

    public static function withJson(
        Response $response,
        $status = 200,
        $data = null
    )
    {

        $status = self::validateStatusCode($status);
        $dataResponse = self::makeResponseMessage($status, $data);
        $response->getBody()->write($dataResponse);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }


    private static function makeResponseMessage($status, $data)
    {

        switch ($status) {
            case 200:
                return $data ? json_encode($data) : self::makeObjectSuccess("Success");
            case 201:
                return $data ? json_encode($data) : self::makeObjectSuccess("Created");
            case 204:
                return $data ? json_encode($data) : self::makeObjectSuccess("No content");
            case 400:
                return self::makeObjectResponseMessage($data ? $data : "Bad Request");
            case 401:
                return self::makeObjectResponseMessage($data ? $data : "Unauthorized");
            case 403:
                return self::makeObjectResponseMessage($data ? $data : "Forbidden");
            case 404:
                return self::makeObjectResponseMessage($data ? $data : "Not Found");
            case 500:
                return self::makeObjectResponseMessage($data ? $data : "Server Error");
            case 503:
                return self::makeObjectResponseMessage($data ? $data : "Service Unavailable");
        }

    }


    private static function makeObjectResponseMessage($message)
    {
        return json_encode(["error" => $message, "timestamp" => date("h:i:sa")]);
    }


    private  function makeObjectSuccess($message)
    {
        return json_encode(["message" => $message, "timestamp" => date("h:i:sa")]);
    }

    private static function validateStatusCode($status)
    {

        if (!in_array($status, self::STATUS_CODES))
            return 200;

        return $status;
    }
}
