<?php
require_once __DIR__ . "/../src/Support/helpers.php";
require_once base_path() . "vendor/autoload.php";
require_once base_path() . "Routes/web.php";

use Http\Route;
use Support\Arr;
use Http\Request;
use Support\Hash;
use Dotenv\Dotenv;
use Http\Response;
use Support\config;
use App\Models\User;
use Src\Database\Grammers\MySQLGrammer;
use Src\Support\Str;
use Src\Validation\Validator;
use Src\Validation\Rules\RequiredRule;
use Src\Validation\Rules\AlphaNumericalRule;

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
var_dump($arr);
echo "<br>";
var_dump(Arr::set($arr,"db.connections.default","pgs"));
echo "<br>";
Arr::unset($arr,"db.connections.default");var_dump($arr);
echo "<br>";
var_dump(Arr::get($arr,"db.connections.secondary"));
echo "<br>";
var_dump(Arr::add($arr,"db.connections.default","sql"));*/
// $config=new config(["db"=>["connection"=>["host"=>"localhost"]]]);var_dump($config->get("db" ));
// var_dump(config_path());
// config(["database.default"=>"sqlite"]) ;var_dump(config());
// var_dump(Hash::verify("token",Hash::password("token")));
/*
$validator=new Validator();
// $validator->setrules(["username"=>"required|string","email"=>"required|email"]); 
// $validator->make(["username"=>"mostafa","email"=>"mostafa@gmail.com"]);
$validator->setrules([
    // "email"=>"required|email|between:32,64",
    "password"=>"required|confirmed","password_confirmation"=>"required"]);
// $validator->setAliases(["username"=>"pass"]);
$validator->make([
    // "email"=>"abgsss",
    "password"=>"mm","password_confirmation"=>"msm"]);
echo "<br>";
var_dump($validator->errors());
*/
/*
var_dump(class_basename(User::class));
echo "<br>";
var_dump(Str::singular("moves"));
echo "<br>";
var_dump(User::all());
*/
/*User::all();
echo "<br>";
$keys=["username","email","password","full_name"];
var_dump("(`".implode("`, `",$keys)."`)");
echo "<br>";
var_dump(MySQLGrammer::buildInsertQuery(["username","email","password"]));
echo "<br>";
var_dump(MySQLGrammer::buildSelectQuery(["username","email","password"],["username","=","mostafa"]));*/
/*var_dump(MySQLGrammer::buildDeleteQuery());
echo "<br>";
var_dump(MySQLGrammer::buildSelectQuery(["username","email","password"],["username","=","mostafa"]));
echo "<br>";
var_dump(MySQLGrammer::buildInsertQuery(["username","email","password"]));
echo "<br>";
var_dump(MySQLGrammer::buildUpdateQuery(["username","email","password"]));*/
/* 
// var_dump(app()->db->raw("SELECT * From users"));
echo "<br>";
// User::update(2,["username"=>"khaled"]) ;
// User::delete(2);
// User::create(["id"=>"2","username"=>"khaled","email"=>"khaled@gmail.com","password"=>bycrypt("112233") ]);
var_dump(User::where(["id",">","1"]));
*/
/* 
// var_dump(app()->session);
// app()->session->setFlash("login",["username"=>"mostafa"]);
var_dump(app()->session->getFlash("login"));
*/
