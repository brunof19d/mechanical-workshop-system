<?php


namespace App\Entity\Product;


interface CategoryRepositoryInterface
{
    public function bringAllCategories(): array;

    public function createCategory(CategoryProduct $category): void;

    public function removeCategory(CategoryProduct $category): void;
}