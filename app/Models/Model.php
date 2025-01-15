<?php
namespace app\Models;

use app\Core\Database;
use PDO;
use PDOException;

class Model {
    private static $db; 
    private static $table; 
    private $conditions = []; 

    public function __construct($table) {
        self::$table = $table;
    }

    public static function where(string $column, string $operator, string $value) {
        $instance = new static();

        $allowedOperators = ['=', '<', '>', '>=', '<='];
        if (in_array($operator, $allowedOperators)) {
            $instance->conditions[] = "{$column} {$operator} '{$value}'";
        }

        return $instance;
    }

    public function get() {
        if (self::$db === null) {
            self::$db = Database::getInstance()->getConnection();
        }
        $query = "SELECT * FROM " . self::$table;

        // Agregar condiciones, si las hay
        if (!empty($this->conditions)) {
            $query .= " WHERE " . implode(" AND ", $this->conditions);
        }

        $stmt = self::$db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function all(array $params = []) {
        if (self::$db === null) {
            self::$db = Database::getInstance()->getConnection();
        }
        $query = "SELECT ";
        if (empty($params)) {
          $query .= "* FROM ".static::$table;
        } else {
          $query .= implode(', ', $params);
          $query .= " FROM ". static::$table;
        }

        $stmt = self::$db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
