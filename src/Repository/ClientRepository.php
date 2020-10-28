<?php


namespace App\Repository;


use App\Database\DatabaseConnection;
use App\Entity\Address\Address;
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

    public function bringAllClients(): array
    {
        $sql = "SELECT * FROM client ORDER BY added DESC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function bringClient(Client $client): array
    {
        $sql = "SELECT * FROM client WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':id' => $client->getId()]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function createClient(Client $client, Address $address): void
    {
        $date = new \DateTimeImmutable();
        $sql = "INSERT INTO client 
            (CPF_CNPJ, firstname, lastname, phone_one, phone_two, email, cep, address, number_address, comp_address, city, state, added) 
            VALUES 
            (:CPF_CNPJ, :firstname, :lastname, :phone_one, :phone_two, :email, :cep, :address, :number_address, :comp_address, :city, :state, :added)
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':CPF_CNPJ'         => $client->getIdentification(),
            ':firstname'        => $client->getFirstName(),
            ':lastname'         => $client->getLastName(),
            ':phone_one'        => $client->getPhoneOne(),
            ':phone_two'        => $client->getPhoneTwo(),
            ':email'            => $client->getEmail(),
            ':cep'              => $address->getCep(),
            ':address'          => $address->getAddress(),
            ':number_address'   => $address->getNumberAddress(),
            ':comp_address'     => $address->getComplementAddress(),
            ':city'             => $address->getCity(),
            ':state'            => $address->getState(),
            ':added'            => $date->format('Y-m-d H:i:s')
        ]);
    }

    public function updateClient(Client $client, Address $address): void
    {
        $sql = "
            UPDATE client SET 
                firstname       = :firstname,
                lastname        = :lastname,
                phone_one       = :phone_one,
                phone_two       = :phone_two,
                email           = :email,
                cep             = :cep,
                address         = :address,
                number_address  = :number_address,
                comp_address    = :comp_address,
                city            = :city,
                state           = :state
            WHERE CPF_CNPJ = :CPF_CNPJ
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':CPF_CNPJ'         => $client->getIdentification(),
            ':firstname'        => $client->getFirstName(),
            ':lastname'         => $client->getLastName(),
            ':phone_one'        => $client->getPhoneOne(),
            ':phone_two'        => $client->getPhoneTwo(),
            ':email'            => $client->getEmail(),
            ':cep'              => $address->getCep(),
            ':address'          => $address->getAddress(),
            ':number_address'   => $address->getNumberAddress(),
            ':comp_address'     => $address->getComplementAddress(),
            ':city'             => $address->getCity(),
            ':state'            => $address->getState(),
        ]);
    }

    public function checkIdentification(Client $client): bool
    {
        $sql = "SELECT * FROM client WHERE CPF_CNPJ = :CPF_CNPJ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([ ':CPF_CNPJ' => $client->getIdentification() ]);

        $count = $statement->rowCount();
        if ($count > 0) return true;

        return false;
    }
}