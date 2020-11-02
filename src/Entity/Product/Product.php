<?php


namespace App\Entity\Product;


class Product
{
    private int $idProduct;
    private string $descriptionProduct;
    private float $valueUnit;
    private int $unit;
    private int $amount;
    private float $valueTotal;

    public function getValueTotal(): float
    {
        return $this->valueTotal;
    }

    public function setValueTotal(float $valueUnit, int $unit): void
    {
        $valueTotal = ($valueUnit * $unit);
        $this->valueTotal = $valueTotal;
    }

    public function getIdProduct(): int
    {
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct): void
    {
        $this->idProduct = $idProduct;
    }

    public function getDescriptionProduct(): string
    {
        return $this->descriptionProduct;
    }

    public function setDescriptionProduct(string $descriptionProduct): void
    {
        $this->descriptionProduct = $descriptionProduct;
    }

    public function getValueUnit(): float
    {
        return $this->valueUnit;
    }

    public function setValueUnit(float $valueUnit): void
    {
        $this->valueUnit = $valueUnit;
    }

    public function getUnit(): int
    {
        return $this->unit;
    }

    public function setUnit(int $unit): void
    {
        $this->unit = $unit;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }
}