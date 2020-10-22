<?php


namespace App\View\Client;


use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AddClientView
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $template = $this->render('client/add-client.php', [
            'title' => 'Adicionar Cliente'
        ]);
        return new Response(200, [], $template);
    }
}