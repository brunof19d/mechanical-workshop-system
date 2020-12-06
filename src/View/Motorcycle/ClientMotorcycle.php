<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Motorcycle;

use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use App\Repository\MotorcycleRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ClientMotorcycle
{
    use RenderHtml;
    use FlashMessage;

    private FilterSanitize $sanitize;
    private MotorcycleRepository $repository;

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

            $template = $this->render('motorcycle/motorcycle_from_client.php', [
                'title' => 'Motocicletas do cliente',
                'motorcycles' => $this->repository->findAllByClient($id),
                'idClient' => $id
            ]);
            return new Response(200, [], $template);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/table-client']);
        }
    }
}