<?php


namespace App\Repository;


use App\Database\DatabaseConnection;
use App\Entity\Client\Client;
use App\Entity\Client\ClientRepositoryInterface;
use PDO;

class ClientRepository implements ClientRepositoryInterface
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::createConnection();
    }

    public function bringAllClients(Client $client)
    {
        // TODO: Implement bringAllClients() method.
    }

    public function bringSingleClient(Client $client)
    {
        // TODO: Implement bringSingleClient() method.
    }

    public function createClient(Client $client): void
    {
        $sql = "INSERT INTO client 
            (CPF_CNPJ, firstname_client, lastname_client, phone_one, phone_two, email) 
            VALUES 
            (:CPF_CNPJ, :firstname_client, :lastname_client, :phone_one, :phone_two, :email)
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':CPF_CNPJ'         => $client->getIdentification(),
            ':firstname_client' => $client->getFirstName(),
            ':lastname_client'  => $client->getLastName(),
            ':phone_one'        => $client->getPhoneOne(),
            ':phone_two'        => $client->getPhoneTwo(),
            ':email'            => $client->getEmail()
        ]);
    }
}