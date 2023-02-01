<?php
require_once __DIR__."/../src/Support/helpers.php";
require_once base_path()."vendor/autoload.php";
require_once base_path()."Routes/web.php";

use Dotenv\Dotenv;
use Http\Route;
use Http\Request;
use Http\Response;
$route=new Route(new Request,new Response); 
// dump($route->request->method(),$route->request->path()); 
var_dump ($route->resolve());   
// var_dump(base_path());
$env = Dotenv::createImmutable(base_path());
$env->load();
// var_dump($_ENV);
// app()->run();

