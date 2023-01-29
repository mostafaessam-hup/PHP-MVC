<?php

namespace Http;

use Http\Request;
use Http\Response;

class Route
{
    public Request $request;
    public Response $response;
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
    public static $routes = [];
    public static function get($route, $action)
    {
        self::$routes['get'][$route] = [$action];
        // dump(self::$routes);
    }
    public static function post($route, $action)
    {
        self::$routes['post'][$route] = [$action];
        dump(self::$routes);
    }
    public function resolve()
    {
        $path = $this->request->path();
        $method = $this->request->method();
        $action = self::$routes[$method][$path] ?? false;
        if (!$action) {
            return;
         }
        //404 handling
        if (is_callable($action)) {
            call_user_func_array($action, []);
        }
        if(is_array($action)){
            call_user_func_array([new $action[0],$action[1]],[]);
        }
    }
}
