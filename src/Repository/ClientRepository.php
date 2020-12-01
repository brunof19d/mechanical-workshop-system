<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Repository;

use App\Database\DatabaseConnection;
use App\Entity\Address\Address;
use App\Entity\Client\Client;
use App\Entity\Client\ClientRepositoryInterface;
use App\Entity\Person\Person;
use DateTimeImmutable;
use Exception;
use PDO;

class ClientRepository implements ClientRepositoryInterface
{
    private PDO $pdo;
    private Client $client;
    private Address $address;
    private Person $person;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::createConnection();
        $this->client = new Client();
        $this->address = new Address();
        $this->person = new Person();
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM client ORDER BY added DESC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $fetch = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $this->hydrateFetchAll($fetch);
    }

    public function findOneBy($id): Client
    {
        $sql = "SELECT * FROM client WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':id' => $id
        ]);
        $fetch = $statement->fetch(PDO::FETCH_ASSOC);

        if (empty($fetch)) throw new Exception('Cliente não encontrado no banco de dados');

        return $this->hydrateFetch($fetch);
    }

    public function save(Client $client): void
    {
        $date = new DateTimeImmutable();
        $person = $client->getPerson();
        $address = $client->getAddress();

        $sql = "INSERT INTO client (CPF_CNPJ, name, phone_one, phone_two, email, cep, address, number_address, 
            comp_address, city, state, added) 
            VALUES 
            (:CPF_CNPJ, :name, :phone_one, :phone_two, :email, :cep, :address, :number_address, :comp_address, :city, 
             :state, :added)
        ";

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':CPF_CNPJ'         => $person->getIdentification(),
            ':name'             => $person->getName(),
            ':phone_one'        => $person->getPhoneOne(),
            ':phone_two'        => $person->getPhoneTwo(),
            ':email'            => $person->getEmail(),
            ':cep'              => $address->getCep(),
            ':address'          => $address->getStreet(),
            ':number_address'   => $address->getNumber(),
            ':comp_address'     => $address->getComplement(),
            ':city'             => $address->getCity(),
            ':state'            => $address->getState(),
            ':added'            => $date->format('Y-m-d H:i:s')
        ]);
    }

    public function update(Client $client): void
    {
        $sql = "
            UPDATE client SET
                CPF_CNPJ        = :CPF_CNPJ,
                name            = :name,
                phone_one       = :phone_one,
                phone_two       = :phone_two,
                email           = :email,
                cep             = :cep,
                address         = :address,
                number_address  = :number_address,
                comp_address    = :comp_address,
                city            = :city,
                state           = :state
            WHERE id = :id
        ";
        $person = $client->getPerson();
        $address = $client->getAddress();

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':CPF_CNPJ'         => $person->getIdentification(),
            ':name'             => $person->getName(),
            ':phone_one'        => $person->getPhoneOne(),
            ':phone_two'        => $person->getPhoneTwo(),
            ':email'            => $person->getEmail(),
            ':cep'              => $address->getCep(),
            ':address'          => $address->getStreet(),
            ':number_address'   => $address->getNumber(),
            ':comp_address'     => $address->getComplement(),
            ':city'             => $address->getCity(),
            ':state'            => $address->getState(),
            ':id'               => $client->getId()
        ]);
    }

    public function findIdentification(Client $client): bool
    {
        $sql = "SELECT * FROM client WHERE CPF_CNPJ = :CPF_CNPJ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':CPF_CNPJ' => $client->getPerson()->getIdentification()
        ]);

        if ($statement->rowCount() > 0) {
            return true;
        }

        return false;
    }

    private function hydrateFetchAll(array $statement): array
    {
        $dataList = $statement;
        $list = [];

        foreach ($dataList as $row) {
            $client = new Client();
            $person = new Person();

            $personList = $person
                ->setName($row['name'])
                ->setIdentification($row['CPF_CNPJ'])
                ->setPhoneOne($row['phone_one'])
                ->setPhoneTwo($row['phone_two'])
                ->setEmail($row['email']);

            $client->setId($row['id']);
            $client->setPerson($personList);
            array_push($list, $client);
        }

        return $list;
    }

    private function hydrateFetch(array $statement): Client
    {
        $dataList = $statement;

        $personList = $this->person
            ->setName($dataList['name'])
            ->setIdentification($dataList['CPF_CNPJ'])
            ->setPhoneOne($dataList['phone_one'])
            ->setPhoneTwo($dataList['phone_two'])
            ->setEmail($dataList['email']);

        $addressList = $this->address
            ->setCep($dataList['cep'])
            ->setStreet($dataList['address'])
            ->setNumber($dataList['number_address'])
            ->setComplement($dataList['comp_address'])
            ->setCity($dataList['city'])
            ->setState($dataList['state']);

        return $this->client
            ->setId($dataList['id'])
            ->setDate($dataList['added'])
            ->setPerson($personList)
            ->setAddress($addressList);
    }
}