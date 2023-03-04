<?php

namespace Src\Validation\Rules;

use Src\Validation\Rules\contract\Rule;

class RequiredRule implements Rule
{
    public function apply($field, $value, $data)
    {
        return !empty($value);
    }
    public function __tostring()
    {
        return "%s is required and cannottt be empty"; 
    }
}
