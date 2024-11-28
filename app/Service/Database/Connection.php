<?php

namespace app\Service\Database;

class Connection {
    private static ?\PDO $connection = null;

    private function __construct() {
        
    }

    public static function getInstance(): \PDO{
        if (self::$connection === null) {
            $dsn = 'pgsql:host=localhost;dbname=frametestdb;';
            $user = 'eldar';
            $password = 'ebr51004';
        
            try {
                self::$connection = new \PDO($dsn, $user, $password);
                self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
        return self::$connection;
    }

}