<?php


namespace App\View\Client;

use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use App\Repository\ClientRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormUpdateClient implements RequestHandlerInterface
{
    use RenderHtml;
    use FlashMessage;

    private ClientRepository $repository;
    private FilterSanitize $sanitize;

    public function __construct(ClientRepository $repository, FilterSanitize $sanitize)
    {
        $this->repository = $repository;
        $this->sanitize = $sanitize;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $id = $this->sanitize
                ->int($request->getQueryParams()['id'], 'ID Cliente invalido');

            $repository = $this->repository
                ->findOneBy($id);

            $template = $this->render('client/form-client.php', [
                'title' => 'Atualizar cliente',
                'action' => 'update',
                'client' => $repository
            ]);

            return new Response(200, [], $template);
        } catch (Exception $error) {
            $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/client/table']);
        }
    }
}