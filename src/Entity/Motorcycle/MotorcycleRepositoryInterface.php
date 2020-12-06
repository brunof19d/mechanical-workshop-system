<?php


namespace App\Entity\Motorcycle;


use App\Entity\Client\Client;

interface MotorcycleRepositoryInterface
{
    /**
     * @param Motorcycle $motorcycle
     * @return array
     */
    public function findOneBy(Motorcycle $motorcycle): Motorcycle;

    /**
     * @param Motorcycle $motorcycle
     * @return array
     */
    public function findAllByClient(Motorcycle $motorcycle): array;

    /**
     * @param Motorcycle $motorcycle
     * @param Client $client
     */
    public function save(Motorcycle $motorcycle): void;

    /**
     * @param Motorcycle $motorcycle
     */
    public function update(Motorcycle $motorcycle): void;

    /**
     * @param Motorcycle $motorcycle
     */
    public function remove(Motorcycle $motorcycle);
}