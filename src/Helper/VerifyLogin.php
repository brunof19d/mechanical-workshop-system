<?php


namespace App\Helper;


use App\Database\DatabaseConnection;
use App\Entity\Admin\Admin;
use PDO;

class VerifyLogin
{
    /**
     * Checks whether data by the user exists in the database.
     * @param Admin $admin Username and password.
     * @return bool
     */
    public function login(Admin $admin): bool
    {
        $sql = "SELECT * FROM admin WHERE username = :username";
        $pdo = DatabaseConnection::createConnection();
        $statement = $pdo->prepare($sql);
        $statement->execute([':username' => $admin->getUsername()]);

        if ($statement->rowCount() > 0) {
            $fetch = $statement->fetch(PDO::FETCH_ASSOC);
            return password_verify($admin->getPassword(), $fetch['password']);
        }
        return false;
    }
}