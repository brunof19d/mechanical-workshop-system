<?php


namespace App\View\OrderService;

use App\Helper\RenderHtml;
use App\Repository\OrderServiceRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class TableOrder
{
    use RenderHtml;

    private OrderServiceRepository $oderRepository;

    public function __construct(OrderServiceRepository $oderRepository)
    {
        $this->oderRepository = $oderRepository;
    }


    public function handle(ServerRequestInterface $request): ResponseInterface
    {



        $template = $this->render('order-service/table-order-service.php', [
            'title' => 'Ordem de serviço',
            'allOrder' => $this->oderRepository->bringAllOrder()
        ]);
        return new Response(200, [], $template);
    }
}