<?php

namespace Src\Validation;

use Src\Validation\Rules\MaxRule;
use Src\Validation\Rules\BetweenRule;
use Src\Validation\Rules\RequiredRule;
use Src\Validation\Rules\AlphaNumericalRule;
use Src\Validation\Rules\ConfirmedRule;
use Src\Validation\Rules\EmailRule;

trait RuleMapper
{
    protected static array $map = [
        "required" => RequiredRule::class,
        "alnum" => AlphaNumericalRule::class,
        "max" => MaxRule::class,
        "between" => BetweenRule::class,
        "email"=>EmailRule::class,
        "confirmed"=>ConfirmedRule::class
    ];
    public static function resolve(string $rule, $options)
    {
        return new static::$map[$rule](...$options);
    }
}
