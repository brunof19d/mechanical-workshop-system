<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Helper;

use App\Database\DatabaseConnection;
use App\Entity\Admin\Admin;
use PDO;

class VerifyLogin
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::createConnection();
    }

    /**
     * Checks whether data by the user exists in the database.
     * @param Admin $admin Username and password.
     * @return bool
     */
    public function login(Admin $admin): bool
    {
        $sql = "SELECT * FROM admin WHERE username = :username";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':username' => $admin->getUsername()
        ]);

        if ($statement->rowCount() > 0) {
            $fetch = $statement->fetch(PDO::FETCH_ASSOC);
            return password_verify($admin->getPassword(), $fetch['password']);
        }

        return false;
    }
}