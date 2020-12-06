<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

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

    public function findOneBy($id): Motorcycle
    {
        $sql = "SELECT * FROM motorcycle WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':id' => $id
        ]);
        $fetch = $statement->fetch(PDO::FETCH_ASSOC);
        return $this->hydrateFetch($fetch);
    }

    public function findAllByClient($id): array
    {
        $sql = "SELECT * FROM motorcycle WHERE id_client = :id_client";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':id_client' => $id
        ]);
        $fetch = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $this->hydrateFetchAll($fetch);
    }

    public function save(Motorcycle $motorcycle): void
    {
        $sql = "INSERT INTO motorcycle 
            (id_client, license_plate, brand, model, manufacture_year, model_year, engine) 
            VALUES 
            (:id_client, :license_plate, :brand, :model, :manufacture_year, :model_year, :engine)
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':id_client'        => $motorcycle->getClient()->getId(),
            ':license_plate'    => $motorcycle->getLicensePlate(),
            ':brand'            => $motorcycle->getBrand(),
            ':model'            => $motorcycle->getModel(),
            ':manufacture_year' => $motorcycle->getYearManufacture(),
            ':model_year'       => $motorcycle->getYearModel(),
            ':engine'           => $motorcycle->getEngine()
        ]);
    }

    public function update(Motorcycle $motorcycle): void
    {
        $sql = "UPDATE motorcycle SET
            license_plate       = :license_plate,
            brand               = :brand,
            model               = :model,
            manufacture_year    = :manufacture_year,
            model_year          = :model_year,
            engine              = :engine
            WHERE id = :id
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':license_plate'    => $motorcycle->getLicensePlate(),
            ':brand'            => $motorcycle->getBrand(),
            ':model'            => $motorcycle->getModel(),
            ':manufacture_year' => $motorcycle->getYearManufacture(),
            ':model_year'       => $motorcycle->getYearModel(),
            ':engine'           => $motorcycle->getEngine(),
            ':id'               => $motorcycle->getId()
        ]);
    }

    public function remove(Motorcycle $motorcycle)
    {
        $sql = "DELETE FROM motorcycle WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':id' => $motorcycle->getId()
        ]);
    }

    private function hydrateFetch(array $statement): Motorcycle
    {
        $dataList = $statement;

        $motorcycle = new Motorcycle();

        return $motorcycle
            ->setId($dataList['id'])
            ->setBrand($dataList['brand'])
            ->setModel($dataList['model'])
            ->setLicensePlate($dataList['license_plate'])
            ->setYearManufacture($dataList['manufacture_year'])
            ->setYearModel($dataList['model_year'])
            ->setEngine($dataList['engine']);
    }

    private function hydrateFetchAll(array $statement): array
    {
        $dataList = $statement;
        $list = [];

        foreach ($dataList as $row) {
            $motorcycle = new Motorcycle();
            $client = new Client();

            $clientList = $client->setId($row['id']);

            $motorcycle
                ->setId($row['id'])
                ->setBrand($row['brand'])
                ->setModel($row['model'])
                ->setLicensePlate($row['license_plate'])
                ->setYearManufacture($row['manufacture_year'])
                ->setYearModel($row['model_year'])
                ->setEngine($row['engine'])
                ->setClient($clientList)
            ;

            array_push($list, $motorcycle);
        }

        return $list;
    }
}