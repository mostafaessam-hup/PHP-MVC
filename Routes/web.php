<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use Http\Route;

Route::get('/this is route',[HomeController::class,"index"]);


