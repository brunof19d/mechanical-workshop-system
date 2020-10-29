<?php


namespace App\Entity\Address;


use App\Entity\Client\Client;

interface AddressInterface
{
    public function bringAddress(Client $client);

    public function createAddress(Client $client): void;
}