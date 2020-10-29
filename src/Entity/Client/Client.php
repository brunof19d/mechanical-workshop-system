<?php


namespace App\Entity\Client;


use App\Helper\ValidCnpj;
use App\Helper\ValidCpf;
use Exception;

class Client
{
    private int $id;
    private string $firstName;
    private ?string $lastName = null;
    private string $identification;
    private string $phoneOne;
    private ?string $phoneTwo = null;
    private ?string $email = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIdentification(): string
    {
        return $this->identification;
    }

    public function setIdentification(string $identification): void
    {
//        $validateCnpj = new ValidCnpj();
//        $validateCpf = new ValidCpf();
//        if (strlen($identification) === 18) {
//            if (!$validateCnpj->verify($identification)) throw new Exception('Número de CNPJ invalido');
//        } elseif (strlen($identification) === 14) {
//            if (!$validateCpf->verify($identification)) throw new Exception('Número de CPF invalido');
//        } else {
//            throw new Exception('Campo CPF / CNPJ invalido');
//        }
        $this->identification = $identification;
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