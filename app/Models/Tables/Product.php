<?php
namespace app\Models\Tables;

use app\Models\Model;

class Product extends Model
{
    protected static $table = 'producto';
    
    public function __construct()
    {
        parent::__construct(self::$table);
    }
}
