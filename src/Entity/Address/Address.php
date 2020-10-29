<?php


namespace App\Entity\Address;


class Address
{
    private string $cep;
    private string $address;
    private int $numberAddress;
    private ?string $complementAddress = null;
    private string $city;
    private string $state;

    public function getCep(): string
    {
        return $this->cep;
    }

    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getNumberAddress(): int
    {
        return $this->numberAddress;
    }

    public function setNumberAddress(int $numberAddress): void
    {
        $this->numberAddress = $numberAddress;
    }

    public function getComplementAddress(): ?string
    {
        return $this->complementAddress;
    }

    public function setComplementAddress(?string $complementAddress): void
    {
        $this->complementAddress = $complementAddress;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        if (strlen($state) > 2) throw new \Exception('Estado invalido');
        $this->state = $state;
    }
}
