<?php


namespace App\Repository;


use App\Database\DatabaseConnection;
use App\Entity\Client\Client;
use App\Entity\Motorcycle\Motorcycle;
use App\Entity\Motorcycle\MotorcycleRepositoryInterface;
use PDO;

class MotorcycleRepository implements MotorcycleRepositoryInterface
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::createConnection();
    }

    public function bringClientMotorcycle(Client $client): array
    {
        $sql = "SELECT * FROM motorcycle WHERE id_client = :id_client";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':id_client' => $client->getId()]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createMotorcycle(Motorcycle $motorcycle, Client $client): void
    {
        $sql = "INSERT INTO motorcycle 
            (id_client, license_plate, brand, model, manufacture_year, model_year, engine_capacity, kilometer) 
            VALUES 
            (:id_client, :license_plate, :brand, :model, :manufacture_year, :model_year, :engine_capacity , :kilometer)
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':id_client'        => $client->getId(),
            ':license_plate'    => $motorcycle->getLicensePlate(),
            ':brand'            => $motorcycle->getBrand(),
            ':model'            => $motorcycle->getModel(),
            ':manufacture_year' => $motorcycle->getManufactureYear(),
            ':model_year'       => $motorcycle->getModelYear(),
            ':engine_capacity'  => $motorcycle->getEngine(),
            ':kilometer'        => $motorcycle->getKmMotorcycle()
        ]);
    }
}