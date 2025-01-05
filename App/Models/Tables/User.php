<?php
namespace app\Models\Tables;

use app\Models\Model;

class User extends Model
{
    protected static $table = 'users';
    
    public function __construct()
    {
        parent::__construct(self::$table);
    }
}
