<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Entity\Client;

use App\Entity\Address\Address;

interface ClientRepositoryInterface
{
    /**
     * Find all registered clients to the database.
     * @return array
     */
    public function findAll(): array;

    /** Find a single client registered in the database.
     * @param $id
     * @return Client
     */
    public function findOneBy($id): Client;

    /**
     * Create register client in database.
     * @param Client $client Receives all necessary data from the client.
     * @return void
     */
    public function save(Client $client): void;

    /**
     * Update register client in database.
     * @param Client $client Receives all necessary data from the client.
     * @return void
     */
    public function update(Client $client): void;

    /**
     * Verify if ID receives already exists in database.
     * @param Client $client Receives a client ID.
     * @return bool
     */
    public function findIdentification(Client $client): bool;
}