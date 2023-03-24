<?php

namespace App\Models;

use Src\Support\Str;

abstract class Model
{
    protected static $instance; 
    public static function create(array $attributes)
    {
        self::$instance = static::class;

        return app()->db->create($attributes);
    }
    public static function all()
    {
        self::$instance = static::class;
        return self::getTableName();

        // return app()->db->read();
    }
    public static function where($filter, $columns = '*')
    {
        self::$instance = static::class;
        return app()->db->read($columns,$filter);

    }
    public static function getModel()
    {
        return self::$instance;
    }
    public static function getTableName()
    {
         return Str::lower(Str::plural(class_basename(self::$instance)));
    }
}
 