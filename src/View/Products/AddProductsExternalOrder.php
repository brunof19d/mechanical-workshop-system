<?php


namespace App\View\Products;


use App\Entity\OrderService\OrderService;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use App\Repository\ProductRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AddProductsExternalOrder implements RequestHandlerInterface
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
            $idOrder = $this->sanitize->int($request->getQueryParams()['id'], 'ID Invalido');
            $this->order->setIdOrder($idOrder);

            $template = $this->render('order-service/add-products-external-in-order.php', [
                'title' => 'Produtos Externo para O.S',
                'idOrder' => $this->order->getIdOrder(),

            ]);
            return new Response(200, [], $template);
        } catch (\Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/table-order']);
        }
    }
}