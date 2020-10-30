<?php


namespace App\Controller\Motorcycle;


use App\Entity\Motorcycle\Motorcycle;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Repository\MotorcycleRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RemoveMotorcycle implements RequestHandlerInterface
{
    use FlashMessage;

    private Motorcycle $motorcycle;
    private MotorcycleRepository $motorcycleRepository;
    private FilterSanitize $sanitize;

    public function __construct(Motorcycle $motorcycle, MotorcycleRepository $motorcycleRepository, FilterSanitize $sanitize)
    {
        $this->motorcycle = $motorcycle;
        $this->motorcycleRepository = $motorcycleRepository;
        $this->sanitize = $sanitize;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $idClient = $this->sanitize->int($_GET['id'], 'ID do cliente invalido');
            $idMotorcycle = $this->sanitize->int($_GET['motorcycle'], 'ID da motocicleta invalido');

            $this->motorcycle->setIdMotorcycle($idMotorcycle);
            $this->alertMessage('success', 'Motocicleta removida com sucesso');
            $this->motorcycleRepository->removeMotorcycle($this->motorcycle);

            return new Response(200, ['Location' => "/motorcycle-client?id=$idClient"]);
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => "/table-client"]);
        }
    }
}