<?php


namespace App\View\Client;


use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SingleClient implements RequestHandlerInterface
{
    use RenderHtml;
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $template = $this->render('client/single-client.php', [
            'title' => 'cliente'
        ]);
        return new Response(200, [], $template);
    }
}