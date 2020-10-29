<?php


namespace App\Entity\Motorcycle;


use App\Entity\Client\Client;

interface MotorcycleRepositoryInterface
{
    /**
     * @param Client $client
     * @return array
     */
    public function bringClientMotorcycle(Client $client): array;

    /**
     * @param Motorcycle $motorcycle
     * @param Client $client
     */
    public function createMotorcycle(Motorcycle $motorcycle, Client $client): void;
}