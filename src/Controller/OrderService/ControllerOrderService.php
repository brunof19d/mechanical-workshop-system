<?php


namespace App\Controller\OrderService;


use App\Entity\Client\Client;
use App\Entity\Motorcycle\Motorcycle;
use App\Entity\OrderService\OrderService;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Repository\OrderServiceRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerOrderService implements RequestHandlerInterface
{
    use FlashMessage;

    private FilterSanitize $sanitize;
    private Client $client;
    private Motorcycle $motorcycle;
    private OrderService $order;
    private OrderServiceRepository $orderRepository;

    public function __construct
    (FilterSanitize $sanitize,
     Client $client,
     Motorcycle $motorcycle,
     OrderService $order,
     OrderServiceRepository $orderRepository)
    {
        $this->sanitize = $sanitize;
        $this->client = $client;
        $this->motorcycle = $motorcycle;
        $this->order = $order;
        $this->orderRepository = $orderRepository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $idClient = $this->sanitize->int($_SESSION['dataClient'], 'ID Cliente invalido');
            $this->client->setId($idClient);

            $idMotorcycle = $this->sanitize->int($_SESSION['dataMotorcycle'], 'ID Moto invalido');
            $this->motorcycle->setIdMotorcycle($idMotorcycle);

            $problemMotorcycle = $this->sanitize->string($_SESSION['problemMotorcycle'], 'Campo do problema informado invalido');
            $this->order->setClientReported($problemMotorcycle);

            $descriptionMotorcycle = $this->sanitize->string($_SESSION['descriptionMotorcycle'], 'Campo desrição invalido');
            $this->order->setDescriptionMotorcycle($descriptionMotorcycle);

            $returnLastIdInsert = $this->orderRepository->createOrder($this->client, $this->motorcycle, $this->order);

            $this->alertMessage('success', 'Ordem de serviço adicionada com sucesso.');
            return new Response(200, ["Location" => "/order?id=$returnLastIdInsert"]);
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/new-os-step1']);
        }
    }
}