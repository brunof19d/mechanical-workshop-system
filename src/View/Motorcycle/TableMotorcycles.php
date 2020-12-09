<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Motorcycle;

use App\Helper\RenderHtml;
use App\Repository\MotorcycleRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TableMotorcycles implements RequestHandlerInterface
{
    use RenderHtml;

    private MotorcycleRepository $repository;

    public function __construct(MotorcycleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $repository = $this->repository
            ->findAll();

        $template = $this->render('motorcycle/table-motorcycles.php', [
            'title' => 'Tabela Motocicletas',
            'motorcycles' => $repository
        ]);

        return new Response(200, [], $template);
    }
}