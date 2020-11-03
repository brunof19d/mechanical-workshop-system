<?php


namespace App\View\OrderService;


use App\Entity\Client\Client;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use App\Repository\MotorcycleRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class NewOrderStepTwo
{
    use RenderHtml;
    use FlashMessage;

    private MotorcycleRepository $motorcycleRepository;
    private FilterSanitize $sanitize;
    private Client $client;

    public function __construct(MotorcycleRepository $motorcycleRepository, FilterSanitize $sanitize, Client $client)
    {
        $this->motorcycleRepository = $motorcycleRepository;
        $this->sanitize = $sanitize;
        $this->client = $client;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $idClient = $this->sanitize->int($_GET['id'], 'ID Invalido');
            $this->client->setId($idClient);

            $template = $this->render('order-service/new-order-service-step2.php', [
                'title' => 'Nova ordem de serviço - Passo 2',
                'allMotorcycle' => $this->motorcycleRepository->bringClientMotorcycle($this->client)
            ]);

            return new Response(200, [], $template);
        } catch (\Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger',$error->getMessage());
            return new Response(302, ['Location' => '/new-order-service']);
        }
    }
}