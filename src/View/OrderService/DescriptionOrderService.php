<?php


namespace App\View\OrderService;


use App\Helper\RenderHtml;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DescriptionOrderService
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $template = $this->render('order-service/description-order-service.php', [
            'title' => 'Nova ordem de serviço'
        ]);
        return new Response(200, [], $template);
    }
}