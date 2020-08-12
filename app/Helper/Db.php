<?php

namespace App\Helper;

class Db
{
    public static $database;

    public static function exists($database, $table)
    {
        self::$database = $database;

        try {
            self::$database->exec("SELECT 1 FROM {$table}");
            return true;
        } catch(\PDOException $e) {
            unset($e);
            return false;
        }
        
        return false;
    }
}