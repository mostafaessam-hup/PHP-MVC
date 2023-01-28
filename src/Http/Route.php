<?php

namespace Http;
use Http\Request;
use Http\Response;
class Route
{
    public Request $request;
    public Response $response;
    public function __construct(Request $request,Response $response)
    {
        $this->request=$request;
        $this->response=$response;
    }
   
    public static $routes = [];
    public static function get($route, $action)
    {
        self::$routes['get'][$route] = [$action];
    }
    public static function post($route, $action)
    {

        self::$routes['post'][$route] = [$action];
    }
}
