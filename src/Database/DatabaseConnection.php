<?php


namespace App\Database;


use PDO;
use PDOException;

class DatabaseConnection
{
    public static function createConnection(): PDO
    {
        $dsn = 'mysql:dbname=mechanic;host=localhost';
        $user = 'root';
        $password = 'macaco123';

        try {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die();
        }
        return $pdo;
    }
}