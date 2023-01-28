<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Routes/web.php';
use Http\Route;
use Http\Request;
use Http\Response;
$route=new Route(new Request,new Response);
dump($route->request->method(),$route->request->path()); 