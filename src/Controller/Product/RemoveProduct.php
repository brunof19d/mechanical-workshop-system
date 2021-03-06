<?php


namespace App\Controller\Product;


use App\Entity\Product\Product;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Repository\ProductRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RemoveProduct implements RequestHandlerInterface
{
    use FlashMessage;

    private Product $product;
    private ProductRepository $repository;
    private FilterSanitize $sanitize;

    public function __construct(Product $product, ProductRepository $repository, FilterSanitize $sanitize)
    {
        $this->product = $product;
        $this->repository = $repository;
        $this->sanitize = $sanitize;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $url = $request->getParsedBody()['url'];
        $redirect = new Response(200, ['Location' => $url]);
        try {
            $idProduct = $this->sanitize->int($request->getParsedBody()['id'], 'Produto invalido');
            $this->product->setIdProduct($idProduct);

            $this->alertMessage('success', 'Produto removido com sucesso');
            return $redirect;
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return $redirect;
        }
    }
}