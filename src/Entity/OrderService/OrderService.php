<?php


namespace App\Entity\OrderService;


class OrderService
{
    private int $idOrder;
    private int $status;
    private ?string $clientReported = null;
    private ?string $descriptionMotorcycle = null;
    private string $dateAdded;
    private ?string $problemFound = null;
    private ?string $executedServices = null;

    public function getIdOrder(): int
    {
        return $this->idOrder;
    }

    public function setIdOrder(int $idOrder): void
    {
        $this->idOrder = $idOrder;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getDescriptionMotorcycle(): string
    {
        return $this->descriptionMotorcycle;
    }

    public function setDescriptionMotorcycle(string $descriptionMotorcycle): void
    {
        $this->descriptionMotorcycle = $descriptionMotorcycle;
    }

    public function getClientReported(): string
    {
        return $this->clientReported;
    }

    public function setClientReported(string $clientReported): void
    {
        $this->clientReported = $clientReported;
    }

    public function getDateAdded(): string
    {
        return $this->dateAdded;
    }

    public function setDateAdded(string $dateAdded): void
    {
        $this->dateAdded = $dateAdded;
    }

    public function getProblemFound(): string
    {
        return $this->problemFound;
    }

    public function setProblemFound(string $problemFound): void
    {
        $this->problemFound = $problemFound;
    }

    public function getExecutedServices(): string
    {
        return $this->executedServices;
    }

    public function setExecutedServices(string $executedServices): void
    {
        $this->executedServices = $executedServices;
    }
}