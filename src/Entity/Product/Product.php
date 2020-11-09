<?php


namespace App\Entity\Product;


class Product
{
    private int $idProduct;
    private string $description;
    private string $value;
    private int $amount;
    private string $valueTotal;

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

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getValueTotal(): string
    {
        return $this->valueTotal;
    }

    public function setValueTotal(int $amount, string $value ): void
    {
        $valueTotal = ( $amount * $value );
        $this->valueTotal = $valueTotal;
    }
}