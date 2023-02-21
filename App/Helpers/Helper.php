<?php
namespace App\Helpers;
class Helper{
 public function dd ($target)
 {
    dump($target);
    die();  
 }
}