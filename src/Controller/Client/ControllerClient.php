<?php


namespace App\Controller\Client;


use App\Entity\Client\Client;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Helper\VerifyDataset;
use App\Repository\ClientRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerClient implements RequestHandlerInterface
{
    use FlashMessage;

    private Client $client;
    private ClientRepository $repository;
    private FilterSanitize $sanitize;
    private VerifyDataset $verifyDataset;

    public function __construct(Client $client, ClientRepository $repository, FilterSanitize $sanitize, VerifyDataset $dataset)
    {
        $this->client = $client;
        $this->repository = $repository;
        $this->sanitize = $sanitize;
        $this->verifyDataset = $dataset;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = $request->getParsedBody();

            /* Input First Name */
            $firstName = $this->sanitize->string($data['first_name'], 'Campo Nome invalido');
            $this->client->setFirstName($firstName);

            /* Input Last Name */
            $lastName = $this->sanitize->string($data['last_name'], 'Campo Sobrenome invalido');
            $this->client->setLastName($lastName);

            /* CPF / CNJPJ */
            $identification = $this->sanitize->string($data['cpf_cnpj'], 'Campo CPF / CNPJ invalido');
            $this->client->setIdentification($identification);

            /* Phone 1 */
            $phoneOne = $this->sanitize->string($data['phone'], 'Campo Telefone 1 invalido');
            $phoneOneFormat = $this->verifyDataset->formatPhone($phoneOne);
            $this->client->setPhoneOne($phoneOneFormat);

            /* Phone 2 */
            $phoneTwo = $data['phone_two'];
            if (!empty($phoneTwo)) {
                $phoneTwo = $this->sanitize->string($phoneTwo, 'Campo Telefone 2 invalido');
                $phoneTwo = $this->verifyDataset->formatPhone($phoneTwo);
            }
            $this->client->setPhoneTwo($phoneTwo);

            /* Email */
            $email = $this->sanitize->email($data['email'], 'Campo E-mail invalido');
            $this->client->setEmail($email);

            $this->repository->createClient($this->client);
            return new Response(200, ['Location' => '/dashboard']);

        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/new-client']);
        }
    }
}