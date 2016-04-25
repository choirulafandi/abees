<?php
namespace Abees\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

abstract class ApiController
{
    public function jsonResponse(Response $response, $responseData)
    {
        $response = $response->withStatus($responseData['status_code'])
            ->withHeader('Content-type', 'application/json')
            ->write(json_encode($responseData));

        return $response;
    }
}