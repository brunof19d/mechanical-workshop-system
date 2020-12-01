<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Entity\Client;

use App\Entity\Address\Address;
use App\Entity\Person\Person;

class Client
{
    private int $id;
    private Person $person;
    private Address $address;
    private string $date;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Client
    {
        $this->id = $id;
        return $this;
    }

    public function getPerson(): Person
    {
        return $this->person;
    }

    public function setPerson(Person $person): Client
    {
        $this->person = $person;
        return $this;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): Client
    {
        $this->address = $address;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): Client
    {
        $this->date = $date;
        return $this;
    }
}