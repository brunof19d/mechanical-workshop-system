<?php


namespace App\View\Products;


use App\Entity\Product\CategoryProduct;
use App\Helper\RenderHtml;
use App\Repository\ProductRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class TableProducts
{
    use RenderHtml;

    private ProductRepository $repository;
    private CategoryProduct $category;

    public function __construct(ProductRepository $repository, CategoryProduct $category)
    {
        $this->repository = $repository;
        $this->category = $category;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $template = $this->render('products/table-products.php', [
            'title'         => 'Tabela Produtos',
            'allCategories' => $this->repository->bringAllCategories(),
            'allProducts' => $this->repository->bringAllProducts()
        ]);
        return new Response(200, [], $template);
    }
}