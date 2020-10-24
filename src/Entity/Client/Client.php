<?php


namespace App\Entity\Client;


class Client
{
    private string $firstName;
    private string $lastName;
    private string $cpfOrcnpj;
    private string $phoneOne;
    private ?string $phoneTwo = null;
    private ?string $email = null;

    public function getCpfOrcnpj(): string
    {
        return $this->cpfOrcnpj;
    }

    public function setCpfOrcnpj(string $cpfOrcnpj): void
    {
        $this->cpfOrcnpj = $cpfOrcnpj;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getPhoneOne(): string
    {
        return $this->phoneOne;
    }

    public function setPhoneOne(string $phoneOne): void
    {
        $this->phoneOne = $phoneOne;
    }

    public function getPhoneTwo(): ?string
    {
        return $this->phoneTwo;
    }


    public function setPhoneTwo(?string $phoneTwo): void
    {
        $this->phoneTwo = $phoneTwo;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
}