<?php


namespace App\Entity\Motorcycle;


use App\Entity\Client\Client;

class Motorcycle
{
    private int $idMotorcycle;
    private string $licensePlate;
    private string $brand;
    private string $model;
    private float $kmMotorcycle;
    private int $engine;
    private int $manufactureYear;
    private int $modelYear;
    private ?string $problemMotorcycle = null;
    private ?string $description = null;

    public function getIdMotorcycle(): int
    {
        return $this->idMotorcycle;
    }

    public function setIdMotorcycle(int $idMotorcycle): void
    {
        $this->idMotorcycle = $idMotorcycle;
    }

    public function getLicensePlate(): string
    {
        return $this->licensePlate;
    }

    public function setLicensePlate(string $licensePlate): void
    {
        $this->licensePlate = $licensePlate;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getKmMotorcycle(): float
    {
        return $this->kmMotorcycle;
    }

    public function setKmMotorcycle(float $kmMotorcycle): void
    {
        $this->kmMotorcycle = $kmMotorcycle;
    }

    public function getEngine(): int
    {
        return $this->engine;
    }

    public function setEngine(int $engine): void
    {
        $this->engine = $engine;
    }

    public function getManufactureYear(): int
    {
        return $this->manufactureYear;
    }

    public function setManufactureYear(int $manufactureYear): void
    {
        $this->manufactureYear = $manufactureYear;
    }

    public function getModelYear(): int
    {
        return $this->modelYear;
    }

    public function setModelYear(int $modelYear): void
    {
        $this->modelYear = $modelYear;
    }

    public function getProblemMotorcycle(): ?string
    {
        return $this->problemMotorcycle;
    }

    public function setProblemMotorcycle(?string $problemMotorcycle): void
    {
        $this->problemMotorcycle = $problemMotorcycle;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }


}