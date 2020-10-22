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
    private Admin $admin;
    private VerifyLogin $verifyLogin;
    use FlashMessage;

    public function __construct()
    {
        $this->admin = new Admin();
        $this->verifyLogin = new VerifyLogin();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $username = filter_var($request->getParsedBody()['username'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
            if ($username === FALSE) throw new Exception('O usuario digitado não é válido.');

            $password = filter_var($request->getParsedBody()['password'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
            if ($password === FALSE) throw new Exception('A senha digitada não é valida.');

            $this->admin->setUsername($username);
            $this->admin->setPassword($password);

            $login = $this->verifyLogin->login($this->admin);
            if ($login === FALSE) throw new Exception('Usuario ou senha incorretos.');

            $_SESSION['auth'] = true;
            return new Response(200, ['Location' => '/dashboard']);
        } catch (\Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/login']);
        }
    }
}