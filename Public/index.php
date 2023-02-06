<?php
require_once __DIR__ . "/../src/Support/helpers.php";
require_once base_path() . "vendor/autoload.php";
require_once base_path() . "Routes/web.php";

use Dotenv\Dotenv;
use Http\Route;
use Http\Request;
use Http\Response;
use Support\Arr;

// $route=new Route(new Request,new Response); 
// dump($route->request->method(),$route->request->path()); 
// $route->resolve();   
$env = Dotenv::createImmutable(base_path());
$env->load();
// var_dump($_ENV);
app()->run();
// var_dump(Arr::only(["username"=>"mostafa","email"=>"mostafa@gmail.com"],["username"]));
// var_dump(Arr::has(["db"=>["connection"=>["default"=>"mysql"]]],"db.connection.default"));
/*var_dump(Arr::last(["one", "two", "three"], function ($item) {
    return (strlen($item >= 3));
}));*/
// $arr=["db"=>["connection"=>["default"=>"mysql"]]];
// $arr2=["username"=>"mostafa","pas"=>123];
// Arr::forget($arr,"db.connection.default");var_dump($arr);
// Arr::except($arr2,"pas");var_dump($arr2);
// var_dump(Arr::flatten([0,[10],[20],[[30]],[[[40]]]],2));
/*$arr=["db"=>["connections"=>["default"=>"mysql","secondary"=>"sqlite"]]];
var_dump(Arr::set($arr,"db.connections.default","pgs"));
echo "<br>";
Arr::unset($arr,"db.connections.default");var_dump($arr);
echo "<br>";
var_dump(Arr::get($arr,"db.connections.secondary"));
echo "<br>";
var_dump(Arr::add($arr,"db.connections.default","sql"));*/



