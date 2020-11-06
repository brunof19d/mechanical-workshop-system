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

class AddProductsInOrder
{
    use RenderHtml;
    use FlashMessage;

    private OrderService $order;
    private FilterSanitize $sanitize;
    private ProductRepository $productRepository;

    public function __construct(OrderService $order, FilterSanitize $sanitize, ProductRepository $productRepository)
    {
        $this->sanitize = $sanitize;
        $this->order = $order;
        $this->productRepository = $productRepository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $idOrder = $this->sanitize->int($request->getQueryParams()['id'], 'ID Invalido');
            $this->order->setIdOrder($idOrder);

            $template = $this->render('order-service/add-products-in-order.php', [
                'title' => 'Produtos para O.S',
                'idOrder' => $this->order->getIdOrder(),
                'allProducts' => $this->productRepository->bringAllProducts()
            ]);

            return new Response(200, [], $template);
        } catch (\Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/table-order']);
        }
    }
}