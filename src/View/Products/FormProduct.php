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

class FormProduct implements RequestHandlerInterface
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

        $template = $this->render('products/form-product.php', [
            'title' => 'Adicionar um produto',
            'categories' => $categories
        ]);

        return new Response(200, [], $template);
    }
}