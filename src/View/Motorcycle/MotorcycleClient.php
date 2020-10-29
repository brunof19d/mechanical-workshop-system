<?php


namespace App\View\Motorcycle;


use App\Entity\Client\Client;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use App\Repository\MotorcycleRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MotorcycleClient
{
    use RenderHtml;
    use FlashMessage;

    private Client $client;
    private FilterSanitize $sanitize;
    private MotorcycleRepository $motorcycleRepository;

    public function __construct(MotorcycleRepository $motorcycleRepository, Client $client, FilterSanitize $sanitize)
    {
        $this->motorcycleRepository = $motorcycleRepository;
        $this->client = $client;
        $this->sanitize = $sanitize;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $idClient = $this->sanitize->int($_GET['id'], 'ID invalido');
            $this->client->setId($idClient);

            $template = $this->render('motorcycle/bike-assoc-client.php', [
                'title'         => 'Motocicletas do cliente',
                'idClient'            => $this->client->getId(),
                'allMotorcycle' => $this->motorcycleRepository->bringClientMotorcycle($this->client)
            ]);

            return new Response(200, [], $template);

        } catch ( Exception $error ) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/table-client']);
        }
    }
}