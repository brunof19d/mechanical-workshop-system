<?php


namespace App\View\OrderService;



use App\Entity\Client\Client;
use App\Entity\Motorcycle\Motorcycle;
use App\Helper\RenderHtml;
use App\Repository\ClientRepository;
use App\Repository\MotorcycleRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class OrderService
{
    use RenderHtml;

    private ClientRepository $clientRepository;
    private MotorcycleRepository $motorcycleRepository;
    private Client $client;
    private Motorcycle $motorcycle;

    public function __construct(ClientRepository $clientRepository, MotorcycleRepository $motorcycleRepository, Client $client, Motorcycle $motorcycle)
    {
        $this->clientRepository = $clientRepository;
        $this->motorcycleRepository = $motorcycleRepository;
        $this->client = $client;
        $this->motorcycle = $motorcycle;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = $request->getParsedBody();

        $idMotorcycle = $data['idMotorcycle'];
        $this->motorcycle->setIdMotorcycle($idMotorcycle);

        $client = $data['idClient'];
        $this->client->setId($client);

        $template = $this->render('order-service/order-service.php', [
            'title' => 'Ordem de serviço',
            'data' => $data,
            'dataClient' => $this->clientRepository->bringClient($this->client),
            'dataMotorcycle' => $this->motorcycleRepository->bringMotorcycle($this->motorcycle),
            'problemDescription' =>  $data['problem'],
            'descriptionMotorcycle' => $data['description']
        ]);
        return new Response(200, [], $template);

    }
}