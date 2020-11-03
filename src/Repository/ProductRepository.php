<?php


namespace App\Repository;

use PDO;
use App\Entity\Product\CategoryProduct;
use App\Entity\Product\CategoryRepositoryInterface;
use App\Database\DatabaseConnection;


class ProductRepository implements CategoryRepositoryInterface
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::createConnection();
    }
    

    public function bringAllCategories(): array
    {
        $sql = "SELECT * FROM category_product ORDER BY name_category";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createCategory(CategoryProduct $category): void
    {
        $sql = "INSERT INTO category_product (name_category) VALUES (:name_category)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':name_category' => $category->getNameCategory()]);
    }

    public function removeCategory(CategoryProduct $category): void
    {
        $sql = "DELETE FROM category_product WHERE name_category = :name_category";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':name_category' => $category->getIdCategory()]);
    }
}