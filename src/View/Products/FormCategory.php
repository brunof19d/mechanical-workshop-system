<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Products;

use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormCategory implements RequestHandlerInterface
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $template = $this->render('products/form-category.php', [
            'title' => 'Adicionar Produto | Categoria',
        ]);

        return new Response(200, [], $template);
    }
}