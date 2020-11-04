<?php


namespace App\View\Products;


use App\Helper\RenderHtml;
use App\Repository\ProductRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AddProduct
{
    use RenderHtml;

    private ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $template = $this->render('products/add-product.php', [
            'title'         => 'Adicionar um produto',
            'allCategories' => $this->repository->bringAllCategories()
        ]);
        return new Response(200, [], $template);
    }
}