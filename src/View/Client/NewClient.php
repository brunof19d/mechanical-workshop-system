<?php


namespace App\View\Client;


use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class NewClient
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $template = $this->render('client/new-client.php', [
            'title' => 'Adicionar cliente'
        ]);
        return new Response(200, [], $template);
    }
}