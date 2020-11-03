<?php


namespace App\Entity\Product;


class CategoryProduct
{
    private int $idCategory;
    private string $nameCategory;

    public function getIdCategory(): int
    {
        return $this->idCategory;
    }

    public function setIdCategory(int $idCategory): void
    {
        $this->idCategory = $idCategory;
    }

    public function getNameCategory(): string
    {
        return $this->nameCategory;
    }

    public function setNameCategory(string $nameCategory): void
    {
        $this->nameCategory = $nameCategory;
    }
}