<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Entity\Person;

class Person
{
    private string $name;
    private string $identification;
    private string $phoneOne;
    private ?string $phoneTwo;
    private string $email;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Person
    {
        $this->name = $name;
        return $this;
    }

    public function getIdentification(): string
    {
        return $this->identification;
    }

    public function setIdentification(string $identification): Person
    {
        $this->identification = $identification;
        return $this;
    }

    public function getPhoneOne(): string
    {
        return $this->phoneOne;
    }

    public function setPhoneOne(string $phoneOne): Person
    {
        $this->phoneOne = $phoneOne;
        return $this;
    }

    public function getPhoneTwo(): ?string
    {
        return $this->phoneTwo;
    }

    public function setPhoneTwo(?string $phoneTwo): Person
    {
        $this->phoneTwo = $phoneTwo;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Person
    {
        $this->email = $email;
        return $this;
    }
}