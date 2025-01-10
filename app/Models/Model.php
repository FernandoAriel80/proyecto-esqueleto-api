<?php

#query builder
namespace app\Models;
use app\Core\Database;
use PDO;
use PDOException;

class Model{
  
    private static $db;
    private static $table;

    public function __construct($table)
    {
        self::$table = $table;
    }

    
     # El metodo all() trae todo valor de la tabla a cosultar, tiene la utilidad de agregar campos a elegir por ejemplo all(["name","last_name"]) esto traeria solamente los datos de nombre y apellido de la tabla a consultar
    public static function all(array $params = []) {
        if (self::$db === null) {
            self::$db = Database::getInstance()->getConnection();
        }
        $query = "";
        if (empty($params)) {
          $query = "SELECT * FROM ";
        }else {
          $query = "SELECT ";
          $query .= implode(', ', $params);
          $query .= " FROM ";
        }
        $stmt = self::$db->prepare($query . static::$table);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function where(string $column, string $operator, string $value){
      if (self::$db === null) {
            self::$db = Database::getInstance()->getConnection();
        }
      $query = "SELECT * from user WHERE ";
      if ($operator == "=") {
          $query .= "{$column} = '{$value}'";
      }
      $stmt = self::$db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   
    public static function create($dato){
        try {
          if (self::$db === null) {
            self::$db = Database::getInstance()->getConnection();
          }
            $keys = implode(', ', array_keys($dato));
            $values = ':' . implode(', :', array_keys($dato));
            $query = "INSERT INTO ".static::$table." ({$keys}) VALUES ({$values})";

            $stm = self::$db->prepare($query);

            foreach ($dato as $key => $value) {
                $stm->bindValue(":{$key}", $value);
            }  
            return $stm->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>