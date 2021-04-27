<?php

class Database {
    private static $dsn = 'mysql:host=localhost;dbname=eating4health';
    private static $username = 'newuser';
    private static $password = 'Eating4Health13!';
    private static $db;

    private function __construct() {}

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
            } catch (PDOException $e) {
                $error_msg = 'Database Error: ' ;
                $error_msg .= $e->getMessage();
                echo $error_msg;
                exit();
        }
    }
        return self::$db;
}
}
