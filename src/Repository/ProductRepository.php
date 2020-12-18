<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

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
    private CategoryProduct $category;
    private Product $product;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::createConnection();
        $this->category = new CategoryProduct();
        $this->product = new Product();
    }

    public function findOneByProduct(Product $product): Product
    {
        $sql = "SELECT * FROM product WHERE id_product = :id_product";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':id_product' => $product->getId()
        ]);
        $fetch = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->hydrateProduct($fetch);
    }

    public function findAllProducts(): array
    {
        $sql = "SELECT * FROM product INNER JOIN category_product ON product.category = category_product.id_category";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $fetch = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $this->hydrateAllProducts($fetch);
    }

    public function findAllCategories(): array
    {
        $sql = "SELECT * FROM category_product ORDER BY name_category";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $fetch = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $this->hydrateAllCategories($fetch);
    }

    public function createProduct(Product $product, CategoryProduct $category): void
    {
        $sql = "INSERT INTO product (category, description, value) VALUES (:category, :description , :value)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':category' => $category->getIdCategory(),
            ':description' => $product->getDescription(),
            ':value' => $product->getValue()
        ]);
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

    private function hydrateProduct(array $statement): Product
    {
        $dataList = $statement;

        $category = $this->category
            ->setIdCategory($dataList['id_category'])
            ->setNameCategory($dataList['name_category']);

        return $this->product
            ->setId($dataList['id'])
            ->setNameProduct($dataList['added'])
            ->setCategory($category)
            ->setValue($dataList['value']);
    }

    private function hydrateAllProducts(array $statement): array
    {
        $dataList = $statement;
        $list = [];

        foreach ($dataList as $row) {
            $product = new Product();
            $category = new CategoryProduct();

            $categoryList = $category
                ->setIdCategory($row['id_category'])
                ->setNameCategory($row['name_category']);

            $product
                ->setId($row['id_product'])
                ->setCategory($categoryList)
                ->setNameProduct($row['description'])
                ->setValue($row['value']);

            array_push($list, $product);
        }

        return $list;
    }

    private function hydrateAllCategories(array $statement): array
    {
        $dataList = $statement;
        $list = [];

        foreach ($dataList as $row) {
            $category = new CategoryProduct();
            $category
                ->setIdCategory($row['id_category'])
                ->setNameCategory($row['name_category']);
            array_push($list, $category);
        }

        return $list;
    }
}