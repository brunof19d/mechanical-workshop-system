<?php


namespace App\View\OrderService;


use App\Helper\RenderHtml;
use App\Repository\ClientRepository;
use App\Repository\MotorcycleRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class NewOrderService
{
    use RenderHtml;

    private ClientRepository $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $template = $this->render('order-service/new-order-service.php', [
            'title'         => 'Nova ordem de serviço',
            'allClients'    => $this->repository->bringAllClients()
        ]);
        return new Response(200, [], $template);
    }
}