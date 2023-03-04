<?php

namespace Src\Validation\Rules;

use Src\Validation\Rules\contract\Rule;

class AlphaNumericalRule implements Rule
{
    public function apply ($field,$value,$data)
    {
        return preg_match("/^[a-zA-Z0-9]+/",$value);
    }
    public function __tostring ()
    {
        return "%s must be characters and numbers only";
    }

}
