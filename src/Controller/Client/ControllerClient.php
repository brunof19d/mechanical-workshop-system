<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Client;

use App\Entity\Address\Address;
use App\Entity\Client\Client;
use App\Entity\Person\Person;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Helper\VerifyDataset;
use App\Repository\ClientRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerClient implements RequestHandlerInterface
{
    use FlashMessage;

    private Client $client;
    private ClientRepository $repository;
    private FilterSanitize $sanitize;
    private VerifyDataset $verifyDataset;
    private Address $address;
    private Person $person;

    public function __construct(Client $client,
                                ClientRepository $repository,
                                FilterSanitize $sanitize,
                                Person $person,
                                Address $address)
    {
        $this->client = $client;
        $this->repository = $repository;
        $this->sanitize = $sanitize;
        $this->person = $person;
        $this->address = $address;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = $request->getParsedBody();

            $identification = $this->sanitize
                ->string($data['identification'], 'Campo CPF / CNPJ invalido');

            $name = $this->sanitize
                ->string($data['name'], 'Campo Nome / Razão Social invalido');

            $phoneOne = $this->sanitize
                ->phone($data['phone_one'], 'Campo Telefone invalido');

            $phoneTwo = $this->sanitize
                ->phone($data['phone_two'], 'Campo Telefone 2 invalido');

            $email = $this->sanitize
                ->email($data['email'], 'Campo E-mail invalido');

            $cep = $this->sanitize
                ->cep($data['cep'], 'Campo CEP invalido');

            $street = $this->sanitize
                ->string($data['address'], 'Campo Endereço invalido');

            $numberAddress = $this->sanitize
                ->int($data['number'], 'Campo Nùmero endereço invalido');

            $complementAddress = $this->sanitize
                ->string($data['complement'], 'Campo complemento do endereço invalido');

            $city = $this->sanitize
                ->string($data['city'], 'Campo Cidade invalido');

            $state = $this->sanitize
                ->string($data['state'], 'Campo Estado invalido');

            $person = $this->person
                ->setIdentification($identification)
                ->setName($name)
                ->setPhoneOne($phoneOne)
                ->setPhoneTwo($phoneTwo)
                ->setEmail($email);

            $address = $this->address
                ->setCep($cep)
                ->setStreet($street)
                ->setNumber($numberAddress)
                ->setComplement($complementAddress)
                ->setCity($city)
                ->setState($state);

            $this->client
                ->setPerson($person)
                ->setAddress($address);

            if (empty($data['id']) === FALSE) {
                $id = $this->sanitize
                    ->int($data['id'], 'ID Cliente invalido');
            }


            if ( $id > 0 ) {
                $this->alertMessage('success', 'Dados atualizados com sucesso');
                $this->client->setId($id);
                $this->repository->update($this->client);
                return new Response(200, ['Location' => "/client?id=$id"]);
            } else {
                echo 'nao deu';
                exit();
//                $this->alertMessage('success', 'Cliente registrado com sucesso');
//                $this->repository->save($this->client);
            }

            return new Response(200, ['Location' => '/client/table']);
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/client/update?id=9']);
        }
    }
}