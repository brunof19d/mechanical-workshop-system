<?php


namespace App\Repository;

use App\Entity\Product\Product;
use App\Entity\Product\ProductRepositoryInterface;
use PDO;
use App\Entity\Product\CategoryProduct;
use App\Entity\Product\CategoryRepositoryInterface;
use App\Database\DatabaseConnection;


class ProductRepository implements CategoryRepositoryInterface, ProductRepositoryInterface
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::createConnection();
    }

    public function bringProduct(Product $product): array
    {
        $sql = "SELECT * FROM product WHERE id_product = :id_product";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':id_product' => $product->getIdProduct()]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function bringAllProducts(): array
    {
        $sql = "SELECT * FROM product INNER JOIN category_product ON product.category = category_product.id_category";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct(Product $product, CategoryProduct $category): void
    {
        $sql = "INSERT INTO product (category, description, value) VALUES (:category, :description , :value)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':category'     => $category->getIdCategory(),
            ':description'  => $product->getDescription(),
            ':value'        => $product->getValue()
        ]);
    }

    public function removeProduct(Product $product): bool
    {
        $sql = "DELETE FROM product WHERE id_product = :id_product";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':id_product' => $product->getIdProduct()]);
        $statement->errorCode();
    }

    public function bringOnlyCategory(CategoryProduct $category): array
    {
        $sql = "SELECT * FROM product 
            INNER JOIN category_product ON product.category = category_product.id_category
            WHERE category = :category ORDER BY description";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':category' => $category->getIdCategory()]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
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