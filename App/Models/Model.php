<?php
namespace App\Models;
use App\Core\Database;
use PDO;

class Model{
  
    private static $db;
    private static $table;

    public function __construct($table)
    {
        self::$table = $table;
    }

    
    public static function all() {
      
        if (self::$db === null) {
            self::$db = Database::getInstance()->getConnection();
        }

        $stmt = self::$db->prepare("SELECT * FROM " . static::$table);
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