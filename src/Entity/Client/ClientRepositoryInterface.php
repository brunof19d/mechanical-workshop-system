<?php


namespace App\Entity\Client;


interface ClientRepositoryInterface
{
    public function bringAllClients(Client $client);

    public function bringSingleClient(Client $client);

    public function createClient(Client $client): void;
}