<?php


namespace App\View\Client;


use App\Entity\Client\Client;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use App\Repository\ClientRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class NewClient
{
    use RenderHtml;
    use FlashMessage;

    private Client $client;
    private ClientRepository $repository;

    public function __construct(Client $client, ClientRepository $repository)
    {
        $this->client = $client;
        $this->repository = $repository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            if ( isset ( $request->getParsedBody()['cpf_cnpj'] ) ) {

                $data = $request->getParsedBody()['cpf_cnpj'];
                $this->client->setIdentification($data);

                $check = $this->repository->checkIdentification($this->client); // Checking if already exists in database.
                if ($check === TRUE) throw new \Exception('CPF já cadastrado no sistema.');
            }

            $template = $this->render('client/new-client.php', [
                'title' => 'Adicionar cliente',
                'cpfCnpj' => isset( $data ) ? $data : ''
            ]);

            return new Response(200, [], $template);
        } catch (\Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/verify-client']);
        }
    }
}