<?php


namespace App\Controller\Product;


use App\Entity\Product\CategoryProduct;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Repository\ProductRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RemoveCategory implements RequestHandlerInterface
{
    use FlashMessage;

    private CategoryProduct $category;
    private ProductRepository $repository;
    private FilterSanitize $sanitize;

    public function __construct(CategoryProduct $category, ProductRepository $repository, FilterSanitize $sanitize)
    {
        $this->category = $category;
        $this->repository = $repository;
        $this->sanitize = $sanitize;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $idCategory = $this->sanitize->int($request->getQueryParams()['id'], 'ID Invalido');
            $this->category->setIdCategory($idCategory);

            $this->repository->removeCategory($this->category);
            $this->alertMessage('success', 'Categoria removida com sucesso');

            return new Response(200, ['Location' => '/table-category']);
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/table-category']);
        }
    }
}