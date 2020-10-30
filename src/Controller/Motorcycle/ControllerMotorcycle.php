<?php


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
    private Client $client;
    private FilterSanitize $sanitize;
    private MotorcycleRepository $motorcycleRepository;

    public function __construct(Motorcycle $motorcycle, Client $client, FilterSanitize $sanitize, MotorcycleRepository $motorcycleRepository)
    {
        $this->motorcycle = $motorcycle;
        $this->motorcycleRepository = $motorcycleRepository;
        $this->client = $client;
        $this->sanitize = $sanitize;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = $request->getParsedBody();

            // License Plate
            $licensePlate = $this->sanitize->string($data['licensePlate'], 'Emplacamento invalido');
            $this->motorcycle->setLicensePlate(strtoupper($licensePlate));

            // Brand motorcycle
            $brand = $this->sanitize->string($data['brandMotorcycle'], 'Marca da moto invalida');
            $this->motorcycle->setBrand($brand);

            // Model motorcycle
            $model = $this->sanitize->string($data['modelMotorcycle'], 'Modelo da moto invalido');
            $this->motorcycle->setModel($model);

            // Engine Capacity
            $engine = $this->sanitize->int($data['engineMotorcycle'], 'Cilindrada invalida');
            $this->motorcycle->setEngine($engine);

            // Kilometer
            $km = filter_var($data['kmMotorcycle'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $this->motorcycle->setKmMotorcycle($km);

            // Manufacture Year
            $manufactureYear = $this->sanitize->int($data['yearMotorcycle'], 'Ano de fabricação invalido');
            $this->motorcycle->setManufactureYear($manufactureYear);

            // Model Year
            $modelYear = $this->sanitize->int($data['yearMotorcycle'], 'Ano de modelo invalido');
            $this->motorcycle->setModelYear($modelYear);

            // ID Client
            $idClient = $this->sanitize->int($data['idClient'], 'ID Invalido');
            $this->client->setId($idClient);

            // ID Motorcycle
            if ($data['idMotorcycle'] !== NULL) {
                $idMotorcycle = $this->sanitize->int($data['idMotorcycle'], 'ID Invalido');
                $this->motorcycle->setIdMotorcycle($idMotorcycle);
            }

            if (array_key_exists('update', $data)) {
                $this->motorcycleRepository->updateMotorcycle($this->motorcycle);
                $this->alertMessage('success', 'Motocicleta atualizada com sucesso');
            } elseif (array_key_exists('save', $data)) {
                $this->motorcycleRepository->createMotorcycle($this->motorcycle, $this->client);
                $this->alertMessage('success', 'Motocicleta adicionada com sucesso');
            } else {
                throw new Exception('Houston, we have a problem');
            }

            return new Response(200, ['Location' => "/motorcycle-client?id=$idClient"]);
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => $data['url']]);
        }
    }
}