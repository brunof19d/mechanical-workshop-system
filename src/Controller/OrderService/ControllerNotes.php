<?php


namespace App\Controller\OrderService;


use App\Entity\OrderService\OrderService;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Repository\OrderServiceRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerNotes implements RequestHandlerInterface
{
    use FlashMessage;

    private FilterSanitize $sanitize;
    private OrderService $order;
    private OrderServiceRepository $repository;

    public function __construct(FilterSanitize $sanitize, OrderService $order, OrderServiceRepository $repository)
    {
        $this->sanitize = $sanitize;
        $this->order = $order;
        $this->repository = $repository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = $request->getParsedBody();
        $id = $data['idOrder'];
        try {

            $problemReported = $data['problem'];
            if (empty($problemReported) === FALSE) {
                $problemReported = $this->sanitize->string($problemReported, 'Campo Problemas invalido');
            }
            $this->order->setClientReported($problemReported);

            $description = $data['description'];
            if (empty($description) === FALSE) {
                $description = $this->sanitize->string($description, 'Campo Observações invalido');
            }
            $this->order->setDescriptionMotorcycle($description);

            $problemFound = $data['found'];
            if (empty($problemFound) === FALSE) {
                $problemFound = $this->sanitize->string($problemFound, 'Campo problema constatado invalido');
            }
            $this->order->setProblemFound($problemFound);

            $executedServices = $data['service'];
            if (empty($executedServices) === FALSE) {
                $executedServices = $this->sanitize->string($executedServices, 'Campo serviço executado invalido');
            }
            $this->order->setExecutedServices($executedServices);

            $this->order->setIdOrder($id);

            $this->repository->updateNotes($this->order);
            $this->alertMessage('success', 'Observações atualizadas com sucesso');

            return new Response(200, ['Location' => "/order?id=$id"]);
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => "/notes-order?id=$id"]);
        }
    }
}