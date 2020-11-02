<?php


namespace App\View\Products;



use App\Entity\OrderService\OrderService;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AddProductsInOrder
{
    use RenderHtml;
    use FlashMessage;

    private OrderService $order;
    private FilterSanitize $sanitize;

    public function __construct(OrderService $order, FilterSanitize $sanitize)
    {
        $this->sanitize = $sanitize;
        $this->order = $order;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $idOrder = $this->sanitize->int($_GET['id'], 'ID Invalido');
            $this->order->setIdOrder($idOrder);

            $template = $this->render('order-service/add-products-in-order.php', [
                'title' => 'Nova ordem de serviço',
            ]);
            return new Response(200, [], $template);
        } catch (\Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger',$error->getMessage());
            return new Response(302, ['Location' => '/new-order-service']);
        }
    }
}