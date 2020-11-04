<?php


namespace App\Entity\Product;


class Product
{
    private int $idProduct;
    private string $description;
    private float $value;

    public function getIdProduct(): int
    {
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct): void
    {
        $this->idProduct = $idProduct;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
    }


}