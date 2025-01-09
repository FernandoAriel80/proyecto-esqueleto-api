<?php
namespace app\Models\Tables;

use app\Models\Model;

class User extends Model
{
    protected static $table = 'user';
    
    public function __construct()
    {
        parent::__construct(self::$table);
    }
}
