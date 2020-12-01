<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Client;

use App\Helper\RenderHtml;
use App\Repository\ClientRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TableClients implements RequestHandlerInterface
{
    use RenderHtml;

    private ClientRepository $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $template = $this->render('client/table-clients.php', [
            'title' => 'Tabela Clientes',
            'allClients' => $this->repository->findAll(),
        ]);

        return new Response(200, [], $template);
    }
}