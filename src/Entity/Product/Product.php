<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Entity\Product;

class Product
{
    private int $id;
    private string $nameProduct;
    private CategoryProduct $category;
    private string $value;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Product
    {
        $this->id = $id;
        return $this;
    }

    public function getNameProduct(): string
    {
        return $this->nameProduct;
    }

    public function setNameProduct(string $nameProduct): Product
    {
        $this->nameProduct = $nameProduct;
        return $this;
    }

    public function getCategory(): CategoryProduct
    {
        return $this->category;
    }

    public function setCategory(CategoryProduct $category): Product
    {
        $this->category = $category;
        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): Product
    {
        $this->value = $value;
        return $this;
    }
}