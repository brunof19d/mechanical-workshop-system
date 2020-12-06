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
use Psr\Http\Server\RequestHandlerInterface;

class FormCreateMotorcycle implements RequestHandlerInterface
{
    use RenderHtml;
    use FlashMessage;

    private FilterSanitize $sanitize;
    private MotorcycleRepository $repository;

    public function __construct(FilterSanitize $sanitize, MotorcycleRepository $repository)
    {
        $this->sanitize = $sanitize;
        $this->repository = $repository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $idClient = $this->sanitize
                ->int($request->getQueryParams()['id'], 'ID Cliente invalido');

            $template = $this->render('motorcycle/form-motorcycle.php', [
                'title' => 'Adicionar motocicleta',
                'button' => 'insert',
                'idClient' => $idClient
            ]);

            return new Response(200, [], $template);
        } catch (Exception $exception) {
            $this->alertMessage('danger', $exception->getMessage());
            return new Response(302, ['Location' => '/client/table']);
        }
    }
}