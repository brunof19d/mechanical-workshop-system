<?php


namespace App\Entity\Product;


interface CategoryRepositoryInterface
{
    public function bringOnlyCategory(CategoryProduct $category): array;

    public function bringAllCategories(): array;

    public function createCategory(CategoryProduct $category): void;

    public function removeCategory(CategoryProduct $category): void;
}