<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\View\Motorcycle;

use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use App\Repository\MotorcycleRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Exception;
use Psr\Http\Server\RequestHandlerInterface;

class FormUpdateMotorcycle implements RequestHandlerInterface
{
    use RenderHtml;
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
            $idMotorcycle = $this->sanitize
                ->int($request->getQueryParams()['motorcycle'], 'ID Motorcycle Invalid');

            $idClient = $this->sanitize
                ->int($request->getQueryParams()['client'], 'ID Client invalid');

            $repository = $this->repository
                ->findOneBy($idMotorcycle);

            $template = $this->render('motorcycle/form-motorcycle.php', [
                'title' => 'Atualizar motocicleta',
                'button' => 'update',
                'idMotorcycle' => $idMotorcycle,
                'idClient' => $idClient,
                'motorcycle' => $repository
            ]);
            return new Response(200, [], $template);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/table-client']);
        }
    }
}