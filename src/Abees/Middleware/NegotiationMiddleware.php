<?php

namespace Abees\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class NegotiationMiddleware
{
    public function __invoke($request, $response, $next)
    {
        $header = $request->getHeader('Content-type');

        if(0 === strpos($header[0], 'application/json')){
            if($request->getHeader('Api-key')[0] == getenv('ACCESS_API')){
                return $next($request, $response);
            }else{
                $response = $response->withStatus(401)
                    ->withHeader('Content-type', 'application/json')
                    ->write(json_encode([
                        'status_code'=> 401,
                        'status_message' => 'Api key tidak tersedia',
                    ]));

                return $response;
            }
        }else{
            $response = $response->withStatus(406)
                ->withHeader('Content-type', 'application/json')
                ->write(json_encode([
                        'status_code'=> 406,
                        'status_message' => 'Content-type Not acceptable',
                ]));

            return $response;
        }
    }
}