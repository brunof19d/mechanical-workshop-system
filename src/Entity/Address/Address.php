<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Entity\Address;

class Address
{
    private string $cep;
    private string $street;
    private int $number;
    private ?string $complement;
    private string $neighborhood;
    private string $city;
    private string $state;

    public function getCep(): string
    {
        return $this->cep;
    }

    public function setCep(string $cep): Address
    {
        $this->cep = $cep;
        return $this;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): Address
    {
        $this->street = $street;
        return $this;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): Address
    {
        $this->number = $number;
        return $this;
    }

    public function getComplement(): ?string
    {
        return $this->complement;
    }

    public function setComplement(?string $complement): Address
    {
        $this->complement = $complement;
        return $this;
    }

    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    public function setNeighborhood(string $neighborhood): Address
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): Address
    {
        $this->state = $state;
        return $this;
    }
}
