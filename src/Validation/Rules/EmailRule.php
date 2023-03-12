<?php
namespace Src\Validation\Rules;

use Src\Validation\Rules\contract\Rule;

class EmailRule implements Rule
{
    
        public function apply ($field,$value,$data)
        {
            return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$value);
        }
        public function __tostring ()
        {
            return "your %s is not a vaild email";
        }

}