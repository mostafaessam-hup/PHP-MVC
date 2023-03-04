<?php

namespace Src\Validation;

use Src\Validation\ErrorBag;
use Src\Validation\Rules\AlphaNumericalRule;
use Src\Validation\Rules\RequiredRule;

class Validator
{
    protected array $data = [];
    protected array $aliases = [];
    protected array $rules = [];
    protected ErrorBag $errorBag;
    protected array $ruleMap=[
        "required"=>RequiredRule::class,
        "alnum"=>AlphaNumericalRule::class
    ];
    public function make($data)
    {
        $this->data = $data;
        $this->errorBag = new ErrorBag();
        $this->validate();
    }
    protected function validate()
    {
        foreach ($this->rules as $field => $rules) {
            foreach ($rules as $rule) {
                if(is_string($rule)){
                    $rule=new $this->ruleMap[$rule];
                }
                if (!$rule->apply($field, $this->getfieldvalue($field), $this->data)) {////
                    $this->errorBag->add($field, Message::generate($rule, $field));
                }
            }
        }
    }

    protected function getfieldvalue($field)
    {
        return $this->data[$field] ?? null;
    }
    public function setrules($rules)
    {
        $this->rules = $rules;
    }
    public function passes()
    {
        return empty($this->errors());
    }
    public function errors($key = null)
    {
        return $key ? $this->errorBag->errors[$key] : $this->errorBag->errors;
    }

    public function aliases($field)
    {
        return $this->aliases[$field] ?? $field;
    }
    public function setAliases(array $aliases)
    {
        $this->aliases = $aliases;
    }
}
