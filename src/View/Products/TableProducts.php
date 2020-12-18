<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Products;

use App\Helper\RenderHtml;
use App\Repository\ProductRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TableProducts implements RequestHandlerInterface
{
    use RenderHtml;

    private ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $categories = $this->repository
            ->findAllCategories();

        $products = $this->repository
            ->findAllProducts();

        $template = $this->render('products/table-products.php', [
            'title' => 'Tabela Produtos',
            'categories' => $categories,
            'products' => $products
        ]);

        return new Response(200, [], $template);
    }
}