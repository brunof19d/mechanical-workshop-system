<?php

namespace App\Controller;

use App\Entity\Admin\Admin;
use App\Helper\FlashMessage;
use App\Helper\VerifyLogin;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerLogin implements RequestHandlerInterface
{
    use FlashMessage;

    private Admin $admin;
    private VerifyLogin $login;

    public function __construct(Admin $admin, VerifyLogin $login)
    {
        $this->admin = $admin;
        $this->login = $login;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $csrfToken = $this->checkCsrfToken($request->getParsedBody()['csrf_token']);
            if ($csrfToken === FALSE) throw new Exception('CSRF Invalid');

            $username = filter_var($request->getParsedBody()['username'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
            if ($username === FALSE) throw new Exception('O usuario digitado não é válido.');

            $password = filter_var($request->getParsedBody()['password'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
            if ($password === FALSE) throw new Exception('A senha digitada não é valida.');

            $this->admin->setUsername($username);
            $this->admin->setPassword($password);

            $login = $this->login->login($this->admin);
            if ($login === FALSE) throw new Exception('Usuario ou senha incorretos.');

            $_SESSION['auth'] = sha1(rand(1, 1000));

            return new Response(200, ['Location' => '/dashboard']);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/login']);
        }
    }

    private function checkCsrfToken(string $token): bool
    {
        if (empty($_SESSION['csrf_token']) === FALSE) {

            if ($_SESSION['csrf_token'] === $token) {
                return true;
            }

            return false;
        }

        return false;
    }
}