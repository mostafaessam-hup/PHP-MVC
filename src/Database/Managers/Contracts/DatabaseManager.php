<?php
namespace Src\Database\Managers\Contracts;

interface DatabaseManager
{
    public function connect ():\PDO;
    public function  query(string $query ,$value=[]);
    public function create($data);
    public function read($coulmn="*",$filter=null);
    public function update($id,$data);
    public function delete($id);
}