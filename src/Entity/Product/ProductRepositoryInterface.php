<?php


namespace App\Entity\Product;


interface ProductRepositoryInterface
{
    public function bringProduct(Product $product): array;

    public function bringAllProducts(): array;

    public function createProduct(Product $product, CategoryProduct $category): void;
}