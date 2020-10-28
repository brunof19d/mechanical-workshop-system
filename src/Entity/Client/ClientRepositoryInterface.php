<?php


namespace App\Entity\Client;


use App\Entity\Address\Address;

interface ClientRepositoryInterface
{
    /**
     * Bring all registered clients to the database.
     * @return array
     */
    public function bringAllClients(): array;

    /**
     * Bring a single client registered in the database.
     * @param Client $client Receives a client ID.
     * @return array
     */
    public function bringClient(Client $client): array;

    /**
     * Create register client in database.
     * @param Client $client Receives all necessary data from the client.
     * @param Address $address Receive all necessary data from the client address.
     * @return void
     */
    public function createClient(Client $client, Address $address): void;

    /**
     * Update register client in database.
     * @param Client $client Receives all necessary data from the client.
     * @param Address $address Receive all necessary data from the client address.
     * @return void
     */
    public function updateClient(Client $client, Address $address): void;

    /**
     * Verify if ID receives already exists in database.
     * @param Client $client Receives a client ID.
     * @return bool
     */
    public function checkIdentification(Client $client): bool;
}