<?php


namespace App\View\OrderService;


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

    private OrderServiceRepository $orderRepository;
    private FilterSanitize $sanitize;
    private \App\Entity\OrderService\OrderService $order;

    public function __construct(OrderServiceRepository $orderRepository, FilterSanitize $sanitize, \App\Entity\OrderService\OrderService $order)
    {
        $this->orderRepository = $orderRepository;
        $this->sanitize = $sanitize;
        $this->order = $order;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $idOrder = $this->sanitize->int($_GET['id'], 'ID Invalido');
            $this->order->setIdOrder($idOrder);

            $template = $this->render('order-service/order.php', [
                'title' => 'Nova ordem de serviço',
                'order' => $this->orderRepository->bringOrder($this->order),
                'allProductsOrder' => $this->orderRepository->bringProductsOrderService($this->order),
                'allpriceOrder' => $this->orderRepository->allpriceOrder($this->order)
            ]);

            return new Response(200, [], $template);
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/table-order']);
        }
    }
}