<?php


namespace App\Entity\Motorcycle;


use App\Entity\Client\Client;

interface MotorcycleRepositoryInterface
{
    /**
     * @param Motorcycle $motorcycle
     * @return array
     */
    public function bringMotorcycle(Motorcycle $motorcycle): array;

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

    /**
     * @param Motorcycle $motorcycle
     */
    public function updateMotorcycle(Motorcycle $motorcycle): void;

    /**
     * @param Motorcycle $motorcycle
     */
    public function removeMotorcycle(Motorcycle $motorcycle): void;
}