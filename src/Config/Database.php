<?php

namespace MVC\Config;

use PDO;

class Database
{
    /**
     * @var null|PDO
     */
    private static $bdd = null;

    private function __construct()
    {
    }

    public static function getBdd()
    {
        if (is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost:3306;dbname=mvc", 'root', 'root');
        }
        return self::$bdd;
    }
}
