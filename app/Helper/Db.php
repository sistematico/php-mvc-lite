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


    public static function install($database)
    {
        try {
            if (file_exists(SQL_FILE)) {
                $sql = file_get_contents(SQL_FILE);
                $database->exec($sql);
                return true;
            } else {
                return false;
            }
        } catch(\PDOException $e) {
            unset($e);
            #return "Error: " . $e->getMessage();
            return false;
        }
    }
}