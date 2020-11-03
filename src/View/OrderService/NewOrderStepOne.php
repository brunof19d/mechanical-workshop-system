<?php


namespace App\View\OrderService;


use App\Helper\RenderHtml;
use App\Repository\ClientRepository;
use App\Repository\MotorcycleRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class NewOrderStepOne
{
    use RenderHtml;

    private ClientRepository $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $template = $this->render('order-service/new-order-service-step1.php', [
            'title'         => 'Nova ordem de serviço - Passo 1',
            'allClients'    => $this->repository->bringAllClients()
        ]);
        return new Response(200, [], $template);
    }
}