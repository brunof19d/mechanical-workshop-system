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

class ControllerExternalProduct implements RequestHandlerInterface
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
            $this->order->setIdOrder($idOrder);

            $description = $this->sanitize->string($data['description'], 'Campo descrição invalido');
            $this->product->setDescription(strtoupper($description));

            $valueProduct = $this->sanitize->string($data['value'],'Campo valor invalido');
            $valueFormatDB = str_replace(',', '.', str_replace('.', '', $valueProduct));
            $this->product->setValue($valueFormatDB);

            $amount = $this->sanitize->int($data['amount'], 'Campo quantidade invalido');
            $this->product->setAmount($amount);

            $this->product->setValueTotal($this->product->getAmount(), $this->product->getValue());

            $this->orderRepository->createExternalProducts($this->order, $this->product);
            $this->alertMessage('success', 'Produto adicionado na O.S com sucesso');

            return new Response(200, ['Location' => "/products-external?id=$idOrder"]);
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ["Location" => "/products-external?id=$idOrder"]);
        }
    }

}