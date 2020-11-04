<?php


namespace App\Controller\Product;


use App\Entity\Product\CategoryProduct;
use App\Entity\Product\Product;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Repository\ProductRepository;
use Exception;
use NumberFormatter;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerProduct implements RequestHandlerInterface
{
    use FlashMessage;

    private Product $product;
    private ProductRepository $repository;
    private FilterSanitize $sanitize;
    private CategoryProduct $category;

    public function __construct(Product $product, ProductRepository $repository, FilterSanitize $sanitize, CategoryProduct $category)
    {
        $this->product = $product;
        $this->repository = $repository;
        $this->sanitize = $sanitize;
        $this->category = $category;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        try {
            $data = $request->getParsedBody();

            $idCategory = $this->sanitize->int($data['category'], 'Categoria invalida');
            $this->category->setIdCategory($idCategory);

            $nameProduct = $this->sanitize->string($data['description'], 'Descrição do produto invalida');
            $this->product->setDescription(strtoupper($nameProduct));

            $valueProduct = $this->sanitize->float($data['value'], 'Valor do produto invalido');
            $this->product->setValue($valueProduct);

            $this->repository->createProduct($this->product, $this->category);
            $this->alertMessage('success', 'Produto adicionado com sucesso');

            return new Response(200, ['Location' => '/add-product']);
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/add-product']);
        }
    }
}