<?php


namespace App\Entity\Product;


interface ProductRepositoryInterface
{
    public function bringAllProducts(): array;

    public function createProduct(Product $product, CategoryProduct $category): void;
}