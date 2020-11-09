<?php


namespace App\Controller\OrderService;



use App\Entity\OrderService\OrderService;
use App\Entity\Product\Product;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Repository\OrderServiceRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RemoveProductsByOrder implements RequestHandlerInterface
{
    use FlashMessage;
    private FilterSanitize $sanitize;
    private OrderService $order;
    private OrderServiceRepository $repository;
    private Product $product;

    public function __construct(FilterSanitize $sanitize, OrderService $order, OrderServiceRepository $repository, Product $product)
    {
        $this->sanitize = $sanitize;
        $this->order = $order;
        $this->repository = $repository;
        $this->product = $product;
    }


    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = $request->getQueryParams();

            $idProduct = $this->sanitize->int($data['product'], 'ID produto invalido');
            $idOrder = $this->sanitize->int($data['id'],'ID O.S invalido');

            $this->product->setIdProduct($idProduct);

            $this->alertMessage('success', 'Produto removido da O.S com sucesso');
            $this->repository->removeProductsByOrder($this->product);

            return new Response(200, ['Location' => "/order?id=$idOrder#request"]);
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => "/table-order"]);
        }
    }
}