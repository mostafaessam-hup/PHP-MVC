<?php
namespace Src\Validation\Rules;

use Src\Validation\Rules\contract\Rule;

class ConfirmedRule implements Rule
{
    public function apply ($field,$value,$data)
    {
        return ($data[$field]==$data[$field."_confirmation"]);
    }

    public function __tostring ()
    {
       return "%s dosn't match %s confirmation";
    }
}