<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Controller\Motorcycle;

use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Repository\MotorcycleRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Exception;
use Nyholm\Psr7\Response;

class RemoveMotorcycle implements RequestHandlerInterface
{
    use FlashMessage;

    private MotorcycleRepository $repository;
    private FilterSanitize $sanitize;

    public function __construct(MotorcycleRepository $repository, FilterSanitize $sanitize)
    {
        $this->repository = $repository;
        $this->sanitize = $sanitize;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $id = $this->sanitize
                ->int($request->getQueryParams()['id'], 'ID Cliente invalido');

            $this->repository->remove($id);

            $this->alertMessage('success', 'Motocicleta removida com sucesso');

            return new Response(200, ['Location' => "/motorcycle-client?id={$id}"]);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());

            return new Response(302, ['Location' => "/table-client"]);
        }
    }
}