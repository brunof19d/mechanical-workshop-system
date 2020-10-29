<?php


namespace App\View\Client;


use App\Entity\Client\Client;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use App\Repository\ClientRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SingleClient implements RequestHandlerInterface
{
    use RenderHtml;
    use FlashMessage;

    private ClientRepository $repository;
    private Client $client;
    private FilterSanitize $sanitize;

    public function __construct(ClientRepository $repository, Client $client, FilterSanitize $sanitize)
    {
        $this->repository = $repository;
        $this->client = $client;
        $this->sanitize = $sanitize;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $id = $_GET['id'];
            $this->sanitize->int($id, 'ID invalido');
            $this->client->setId($id);

            $template = $this->render('client/single-client.php', [
                'title' => 'Dados cliente',
                'client' => $this->repository->bringClient($this->client)
            ]);

            return new Response(200, [], $template);

        } catch ( Exception $error ) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/table-client']);
        }


    }
}