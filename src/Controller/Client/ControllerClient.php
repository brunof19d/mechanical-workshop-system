<?php


namespace App\Controller\Client;


use App\Entity\Address\Address;
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
    private Address $address;

    public function __construct(Client $client, ClientRepository $repository, FilterSanitize $sanitize, Address $address, VerifyDataset $dataset)
    {
        $this->client = $client;
        $this->repository = $repository;
        $this->sanitize = $sanitize;
        $this->address = $address;
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

            /* CEP */
            $cep = $this->sanitize->string($data['cep'], 'Campo CEP invalido');
            $cepFormat = $this->verifyDataset->formatCep($cep);
            $this->address->setCep($cepFormat);

            /* Address */
            $address = $this->sanitize->string($data['endereco'], 'Campo invalido');
            $this->address->setAddress($address);

            /* Number Address */
            $numberAddress = $this->sanitize->int($data['numero'], 'Campo número invalido');
            $this->address->setNumberAddress($numberAddress);

            /* Complement Address */
            $complement = $data['complemento'];
            if (!empty($complement)) {
                $complement = $this->sanitize->string($data['complemento'], 'Campo Complemento invalido');
            }
            $this->address->setComplementAddress($complement);

            /* City */
            $city = $this->sanitize->string($data['cidade'], 'Campo Cidade invalido');
            $this->address->setCity($city);

            /* State */
            $state = $this->sanitize->string($data['uf'], 'Campo UF invalido');
            $this->address->setState($state);

            if (isset($_POST['update'])) {
                $this->repository->updateClient($this->client, $this->address);
                $this->alertMessage('success', 'Cliente atualizado com sucesso');
                return new Response(200, ['Location' => '/table-client']);
            }

            $this->alertMessage('success', 'Cliente registrado com sucesso');
            $this->repository->createClient($this->client, $this->address);

            return new Response(200, ['Location' => '/table-client']);
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => $data['url']]);
        }
    }
}