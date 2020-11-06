<?php


namespace App\View\OrderService;


use App\Entity\OrderService\OrderService;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use App\Repository\OrderServiceRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Order
{
    use RenderHtml;
    use FlashMessage;

    private OrderServiceRepository $repository;
    private FilterSanitize $sanitize;
    private OrderService $order;

    public function __construct(OrderServiceRepository $repository, FilterSanitize $sanitize, OrderService $order)
    {
        $this->repository = $repository;
        $this->sanitize = $sanitize;
        $this->order = $order;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $idOrder = $this->sanitize->int($_GET['id'], 'ID OS Invalido');
            $this->order->setIdOrder($idOrder);

            $template = $this->render('order-service/order.php', [
                'title' => 'Ordem de serviço',
                'order' => $this->repository->bringOrder($this->order),
                'products' => $this->repository->bringProductsOrderService($this->order),
                'sumTotal' => $this->repository->sumTotalProducts($this->order)
            ]);

            return new Response(200, [], $template);
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/table-order']);
        }
    }
}