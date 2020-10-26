<?php


namespace App\View\Motorcycle;


use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class NewMotorcycle
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $template = $this->render('motorcycle/new-motorcycle.php', [
            'title' => 'Adicionar motocicleta'
        ]);
        return new Response(200, [], $template);
    }
}