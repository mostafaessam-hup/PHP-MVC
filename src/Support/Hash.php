<?php
namespace Support;

class Hash
{
    public static function password ($value)
    {
        return password_hash($value,PASSWORD_BCRYPT,);
    }
    public static function make($value)
    {
        return sha1($value.time());
    }
    public static function  verify($value,$hasedvalue)
    {
        return password_verify($value,$hasedvalue);
    }

}