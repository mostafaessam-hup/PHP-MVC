<?php

namespace Src\Database\Managers;

use App\Models\Model;
use PDO;
use Src\Database\Grammers\MySQLGrammer;
use Src\Database\Managers\Contracts\DatabaseManager;

class MySqlManager implements DatabaseManager
{
    protected static $instance;
    public function connect(): \PDO
    {
        if (!self::$instance) {
            self::$instance = new \PDO(
                env('DB_DRIVER') . ':host=' . env('DB_HOST') . ';dbname=' . env('DB_DATABASE'),
                env('DB_USERNAME'),
                env('DB_PASSWORD')
            );
            // 'mysql:host=localhost;dbname=php_mvc', env("DB_USERNAME"), env("DB_PASSWORD")
        }
        return self::$instance;
    }
    public function query(string $query, $values = [])
    {
        $stmt = self::$instance->prepare($query); ////
        for ($i = 1; $i <= count($values); $i++) {
            $stmt->bindValue($i, $values[$i - 1]);
        }
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function read($coulmns = "*", $filter = null)
    {
        $query = MySQLGrammer::buildSelectQuery($coulmns,$filter);
        $stmt = self::$instance->prepare($query);
        if($filter){
            $stmt->bindvalue(1,$filter[2]);
        }
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,Model::getModel());
    }

    public function delete($id)
    {
        $query = MySQLGrammer::buildDeleteQuery();
        $stmt = self::$instance->prepare($query);
        $stmt->bindvalue(1,$id);
        return $stmt->execute();
    }
    
    public function update($id, $attributes)
    {
        $query = MySQLGrammer::buildUpdateQuery(array_keys($attributes));
        $stmt = self::$instance->prepare($query);
        for ($i=1;$i<= count($values=array_values($attributes));$i++){

            $stmt->bindvalue($i,$values[$i-1]);
        }
        if ($i=count($attributes)){
            $stmt->bindvalue($i+1,$id);

        }
        return $stmt->execute();
    }
    public function create($data)
    {
        $query = MySQLGrammer::buildInsertQuery(array_keys($data));
        $stmt = self::$instance->prepare($query);
        for ($i=1;$i<= count($values=array_values($data));$i++){
            $stmt->bindvalue($i,$values[$i-1]);
        }
        return $stmt->execute();
    }
}
