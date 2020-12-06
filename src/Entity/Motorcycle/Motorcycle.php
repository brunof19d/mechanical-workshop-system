<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Entity\Motorcycle;

use App\Entity\Client\Client;

class Motorcycle
{
    private int $id;
    private Client $client;
    private string $licensePlate;
    private string $brand;
    private string $model;
    private int $engine;
    private string $yearManufacture;
    private string $yearModel;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Motorcycle
    {
        $this->id = $id;
        return $this;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): Motorcycle
    {
        $this->client = $client;
        return $this;
    }

    public function getLicensePlate(): string
    {
        return $this->licensePlate;
    }

    public function setLicensePlate(string $licensePlate): Motorcycle
    {
        $this->licensePlate = $licensePlate;
        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): Motorcycle
    {
        $this->brand = $brand;
        return $this;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): Motorcycle
    {
        $this->model = $model;
        return $this;
    }

    public function getEngine(): int
    {
        return $this->engine;
    }

    public function setEngine(int $engine): Motorcycle
    {
        $this->engine = $engine;
        return $this;
    }

    public function getYearManufacture(): string
    {
        return $this->yearManufacture;
    }

    public function setYearManufacture(string $yearManufacture): Motorcycle
    {
        $this->yearManufacture = $yearManufacture;
        return $this;
    }
    public function getYearModel(): string
    {
        return $this->yearModel;
    }

    public function setYearModel(string $yearModel): Motorcycle
    {
        $this->yearModel = $yearModel;
        return $this;
    }
}