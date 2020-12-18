<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Entity\Product;

class CategoryProduct
{
    private int $idCategory;
    private string $nameCategory;

    public function getIdCategory(): int
    {
        return $this->idCategory;
    }

    public function setIdCategory(int $idCategory): CategoryProduct
    {
        $this->idCategory = $idCategory;
        return $this;
    }

    public function getNameCategory(): string
    {
        return $this->nameCategory;
    }

    public function setNameCategory(string $nameCategory): CategoryProduct
    {
        $this->nameCategory = $nameCategory;
        return $this;
    }
}