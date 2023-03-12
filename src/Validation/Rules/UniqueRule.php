<?php

namespace Src\Validation\Rules;

use Src\Validation\Rules\contract\Rule;

class UniqueRule implements Rule
{
    protected $table;
    protected $column;
    public function __construct($table, $coulmn)
    {
        $this->table = $table;
        $this->column = $coulmn;
    }
    public function apply($field, $value, $data)
    {
        return !(app()->db->raw("SELECT * FROM {$this->table} WHERE {$this->column} = ?", [$value]));
    }

    public function __tostring()
    {
        return "this %s is already taken";
    }
}
