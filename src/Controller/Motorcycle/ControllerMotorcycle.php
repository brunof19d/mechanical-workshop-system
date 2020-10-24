<?php


namespace App\Controller\Motorcycle;


use App\Entity\Address\Address;
use App\Helper\FilterSanitize;
use App\Helper\VerifyDataset;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerMotorcycle implements RequestHandlerInterface

{
    private Address $address;
    private FilterSanitize $sanitize;
    private VerifyDataset $verifyDataset;

    public function __construct()
    {
        $this->address = new Address();
        $this->sanitize = new FilterSanitize();
        $this->verifyDataset = new VerifyDataset();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /* CEP */
        $cep = $this->sanitize->string($request->getParsedBody()['cep'], 'Campo CEP invalido');
        $cepFormat = $this->verifyDataset->formatCep($cep);
        $this->address->setCep($cepFormat);

        /* Address */
        $address = $this->sanitize->string($request->getParsedBody()['endereco'], 'Campo invalido');
        $this->address->setAddress($address);

        /* Number Address */
        $numberAddress = $this->sanitize->int($request->getParsedBody()['numero'], 'Campo número invalido');
        $this->address->setNumberAddress($numberAddress);

        /* Complement Address */
        $complement = $this->sanitize->string($request->getParsedBody()['complemento'], 'Campo Complemento invalido');
        $this->address->setComplementAddress($complement);

        /* City */
        $city = $this->sanitize->string($request->getParsedBody()['cidade'], 'Campo Cidade invalido');
        $this->address->setCity($city);

        /* State */
        $state = $this->sanitize->string($request->getParsedBody()['uf'], 'Campo UF invalido');
        $this->address->setState($state);
    }
}