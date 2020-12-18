<?php


namespace App\Entity\Product;


interface ProductRepositoryInterface
{
    public function findOneByProduct(Product $product): Product;

    public function findAllProducts(): array;

    public function createProduct(Product $product, CategoryProduct $category): void;
}