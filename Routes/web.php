<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use Http\Route;
use App\Controllers\RegisterController;

Route::get('/',[HomeController::class,"index"]);
Route::get('/home', [HomeController::class, 'index']);
Route::get("/signup",[RegisterController::class,"index"]);
Route::post('/signup', [RegisterController::class, 'store']);

