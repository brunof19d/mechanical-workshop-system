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
use App\Repository\ClientRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Exception;
use Nyholm\Psr7\Response;

class ControllerClient implements RequestHandlerInterface
{
    use FlashMessage;

    private Client $client;
    private ClientRepository $repository;
    private FilterSanitize $sanitize;
    private Address $address;
    private Person $person;

    public function __construct(Client $client, ClientRepository $repository, FilterSanitize $sanitize, Person $person, Address $address)
    {
        $this->client = $client;
        $this->repository = $repository;
        $this->sanitize = $sanitize;
        $this->person = $person;
        $this->address = $address;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = $request->getParsedBody(); // Data received from the form.

        // Filter ID IF exists.
        if (empty($data['id']) === FALSE) {
            $id = filter_var($data['id'], FILTER_VALIDATE_INT);

            if ($id === FALSE) {
                $this->alertMessage('danger', 'ID Cliente invalid');
                return new Response(302, ['Location' => '/client/table']);
            }
        }

        // Makes the correct redirection depending on which page the data is coming from.
        if (isset($data['insert'])) {
            $redirectError = new Response(302, ['Location' => '/client/add']);
        } elseif (isset($data['update'])) {
            $redirectError = new Response(302, ['Location' => "/client/update?id={$id}"]);
        } else {
            $redirectError = new Response(302, ['Location' => "/client/table"]);
        }

        try {
            $identification = $this->sanitize
                ->string($data['identification'], 'Campo CPF / CNPJ invalido');

            $name = $this->sanitize
                ->string($data['name'], 'Campo Nome / Razão Social invalido');

            $phoneOne = $this->sanitize
                ->phone($data['phone_one'], 'Campo Telefone invalido');

            $phoneTwo = '';
            if (empty($data['phone_two']) === FALSE) {
                $phoneTwo = $this->sanitize
                    ->phone($data['phone_two'], 'Campo Telefone 2 invalido');
            }

            $email = $this->sanitize
                ->email($data['email'], 'Campo E-mail invalido');

            $cep = $this->sanitize
                ->cep($data['cep'], 'Campo CEP invalido');

            $street = $this->sanitize
                ->string($data['address'], 'Campo Endereço invalido');

            $numberAddress = $this->sanitize
                ->int($data['number'], 'Campo Nùmero endereço invalido');

            $complementAddress = '';
            if (empty($data['complement']) === FALSE) {
                $complementAddress = $this->sanitize
                    ->string($data['complement'], 'Campo complemento do endereço invalido');
            }

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

            if ($id > 0) {
                $this->alertMessage('success', 'Dados atualizados com sucesso');

                $this->client
                    ->setId($id);

                $this->repository
                    ->update($this->client);

                return new Response(200, ['Location' => "/client?id={$id}"]);
            }

            $this->alertMessage('success', 'Cliente registrado com sucesso');
            $this->repository
                ->save($this->client);

            return new Response(200, ['Location' => '/client/table']);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());

            return $redirectError;
        }
    }
}