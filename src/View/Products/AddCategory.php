<?php


namespace App\View\Products;


use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AddCategory
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $template = $this->render('products/add-category.php', [
            'title' => 'Adicionar uma categoria',
        ]);
        return new Response(200, [], $template);
    }
}