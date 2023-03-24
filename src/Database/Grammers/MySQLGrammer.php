<?php

namespace Src\Database\Grammers;

use App\Models\Model;

class MySQLGrammer
{
    public static function buildInsertQuery($keys)
    {
        $values = "";
        for ($i = 1; $i <= count($keys); $i++) {
            $values .= "?,";
        }
        $query = "INSERT INTO " . Model::getTableName() . " (`" . implode("`, `", $keys) . "`) VALUES(" . rtrim($values, ",") . ")";
        return $query;
    }
    
    public static function buildUpdateQuery ($keys)
    {
        $query="UPDATE ".Model::getTableName()." SET "  ;
        foreach($keys as $key){
            $query .=$key ." = ?, ";
        }
        $query = rtrim($query,", ")." WHERE ID = ?";
        return $query;
    }

    public static function buildSelectQuery($coulmns, $filter = null)
    {
        if (is_array($coulmns)) {
            $coulmns = implode(", ", $coulmns);
        }
        $query = "SELECT $coulmns FROM " . Model::getTableName();
        if ($filter) {
            $query .= " WHERE $filter[0] $filter[1] ?";
        }
        return $query;
    }

    public static function buildDeleteQuery()
    {
        return "DELETE FROM " . Model::getTableName() . " WHERE ID = ?";
    }
}
