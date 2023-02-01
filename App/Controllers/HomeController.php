<?php

namespace App\Controllers;

use View\View;

class HomeController
{
    public function index()
    {
        return View::make("home");
    }
    
    
}

