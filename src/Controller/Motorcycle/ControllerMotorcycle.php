<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Motorcycle;

use App\Entity\Client\Client;
use App\Entity\Motorcycle\Motorcycle;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Repository\MotorcycleRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerMotorcycle implements RequestHandlerInterface
{
    use FlashMessage;

    private Motorcycle $motorcycle;
    private FilterSanitize $sanitize;
    private MotorcycleRepository $repository;
    private Client $client;

    public function __construct(Motorcycle $motorcycle, FilterSanitize $sanitize, MotorcycleRepository $repository, Client $client)
    {
        $this->motorcycle = $motorcycle;
        $this->repository = $repository;
        $this->sanitize = $sanitize;
        $this->client = $client;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = $request->getParsedBody();
        $idMotorcycle = $data['idMotorcycle'];
        $idClient = $data['idClient'];

        if (isset($data['update'])) {
            $redirectError = new Response(302, [
                'Location' => "/client/motorcycle/update?motorcycle={$idMotorcycle}&client={$idClient}"
            ]);
        } else {
            $redirectError = new Response(302, [
                'Location' => "/client/motorcycle/add?id={$idClient}"
            ]);
        }

        try {
            $licensePlate = $this->sanitize
                ->string($data['license'], 'Emplacamento invalido');

            $brand = $this->sanitize
                ->string($data['brand'], 'Marca da moto invalida');

            $model = $this->sanitize
                ->string($data['model'], 'Modelo da moto invalido');

            $engine = $this->sanitize
                ->int($data['engine'], 'Cilindrada invalida');

            $manufactureYear = $this->sanitize
                ->int($data['yearManufacture'], 'Ano de fabricação invalido');

            $modelYear = $this->sanitize
                ->int($data['yearModel'], 'Ano de modelo invalido');

            $idClient = $this->sanitize
                ->int($data['idClient'], 'ID Cliente Invalido');

            $this->motorcycle
                ->setLicensePlate($licensePlate)
                ->setBrand($brand)
                ->setModel($model)
                ->setEngine($engine)
                ->setYearManufacture($manufactureYear)
                ->setYearModel($modelYear);

            if (isset($data['update'])) {
                $idMotorcycle = $this->sanitize
                    ->int($data['idMotorcycle'], 'ID Invalido');

                $this->motorcycle->setId($idMotorcycle);

                $this->repository->update($this->motorcycle);

                $this->alertMessage('success', 'Dados da motocicleta atualizado com sucesso');
                return new Response(200, ['Location' => "/client/motorcycle?id={$idClient}"]);
            }
            $client = $this->client
                ->setId($idClient);

            $this->motorcycle
                ->setClient($client);

            $this->repository->save($this->motorcycle);
            $this->alertMessage('success', 'Motocicleta adicionada com sucesso');

            return new Response(200, ['Location' => "/client/motorcycle?id={$idClient}"]);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return $redirectError;
        }
    }
}