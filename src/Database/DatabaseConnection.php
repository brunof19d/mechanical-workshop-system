<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Database;

use PDO;
use PDOException;

class DatabaseConnection
{
    public static function createConnection(): PDO
    {
        try {
            $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die();
        }

        return $pdo;
    }
}