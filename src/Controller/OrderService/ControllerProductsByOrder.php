<?php


namespace App\Controller\OrderService;


use App\Entity\OrderService\OrderService;
use App\Entity\Product\Product;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Repository\OrderServiceRepository;
use App\Repository\ProductRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerProductsByOrder implements RequestHandlerInterface
{
    use FlashMessage;

    private FilterSanitize $sanitize;
    private OrderServiceRepository $orderRepository;
    private OrderService $order;
    private Product $product;
    private ProductRepository $productRepository;

    public function __construct(FilterSanitize $sanitize,
                                OrderServiceRepository $orderRepository,
                                OrderService $order, Product $product,
                                ProductRepository $productRepository)
    {
        $this->sanitize = $sanitize;
        $this->orderRepository = $orderRepository;
        $this->order = $order;
        $this->product = $product;
        $this->productRepository = $productRepository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {




        $data = $request->getParsedBody();
        $idOrder = $data['idOrder'];


        try {

            if (array_key_exists('form1', $_POST)) {

                $this->order->setIdOrder($idOrder);

                $amount = $this->sanitize->int($data['amount'], 'Quantidade invalida');
                $this->product->setAmount($amount);

                $product = $this->sanitize->int($data['productSystem'], 'ID do produto invalido');
                $this->product->setIdProduct($product);

                $fetchProduct = $this->productRepository->bringProduct($this->product);
                $this->product->setValue($fetchProduct['value']);

                $this->product->setValueTotal($amount, $fetchProduct['value']);

            }

            $this->orderRepository->createProductByOrder($this->order, $this->product);
            $this->alertMessage('success', 'Produto adicionado na O.S com sucesso');
            return new Response(200, ['Location' => "/products-by-order?id=$idOrder"]);

        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ["Location" => "/products-by-order?id=$idOrder"]);
        }

    }
}