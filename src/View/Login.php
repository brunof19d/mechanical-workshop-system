<?php

namespace App\View;

use App\Helper\RenderHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Login implements RequestHandlerInterface
{
    use RenderHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $tokenCsrf = $this->csrfToken();

        $template = $this->render('login.php', [
            'title' => 'Login',
            'tokenCsrf' => $tokenCsrf
        ]);

        return new Response(200, [], $template);
    }

    private function csrfToken(): string
    {
        $_SESSION['csrf_token'] = sha1(rand(1, 1000));
        return $_SESSION['csrf_token'];
    }
}