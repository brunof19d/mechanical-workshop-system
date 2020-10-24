<?php


namespace App\Controller\OrderService;


use App\Entity\Address\Address;
use App\Entity\Client\Client;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Helper\ValidCnjpj;
use App\Helper\ValidCpf;
use App\Helper\VerifyDataset;
use App\Repository\ClientRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ControllerOrderService implements RequestHandlerInterface
{
    use FlashMessage;

    private ValidCpf $validateCpf;
    private VerifyDataset $verifyDataset;
    private ValidCnjpj $validateCnpj;
    private Client $client;
    private FilterSanitize $sanitize;
    private ClientRepository $repository;

    public function __construct()
    {
        $this->client = new Client();
        $this->sanitize = new FilterSanitize();
        $this->validateCpf = new ValidCpf();
        $this->validateCnpj = new ValidCnjpj();
        $this->verifyDataset = new VerifyDataset();
        $this->repository = new ClientRepository();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            /* Input First Name */
            $firstName = $this->sanitize->string($request->getParsedBody()['first_name'], 'Campo Nome invalido');
            $this->client->setFirstName($firstName);

            /* Input Last Name */
            $lastName = $this->sanitize->string($request->getParsedBody()['last_name'], 'Campo Sobrenome invalido');
            $this->client->setLastName($lastName);

            /* CPF / CNJPJ */
            $identification = $this->sanitize->string($request->getParsedBody()['cpf_cnpj'], 'Campo CPF / CNPJ invalido');
            if (strlen($identification) === 18) {
                if (!$this->validateCnpj->verify($identification)) throw new Exception('Número de CNPJ invalido');
            } elseif (strlen($identification) === 14) {
                if (!$this->validateCpf->verify($identification)) throw new Exception('Número de CPF invalido');
            } else {
                throw new Exception('Campo CPF / CNPJ invalido');
            }
            $this->client->setCpfOrcnpj($identification);

            /* Phone 1 */
            $phoneOne = $this->sanitize->string($request->getParsedBody()['phone'], 'Campo Telefone 1 invalido');
            $phoneOneFormat = $this->verifyDataset->formatPhone($phoneOne);
            $this->client->setPhoneOne($phoneOneFormat);

            /* Phone 2 */
            $phoneTwo = $request->getParsedBody()['phone_two'];
            if (!empty($phoneTwo)) {
                $phoneTwo = $this->sanitize->string($phoneTwo, 'Campo Telefone 2 invalido');
                $phoneTwo = $this->verifyDataset->formatPhone($phoneTwo);
            }
            $this->client->setPhoneTwo($phoneTwo);

            /* Email */
            $email = $this->sanitize->email($request->getParsedBody()['email'], 'Campo E-mail invalido');
            $this->client->setEmail($email);

            $this->repository->createClient($this->client);
            return new Response(200, ['Location' => '/dashboard']);

        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/new-order']);
        }
    }
}