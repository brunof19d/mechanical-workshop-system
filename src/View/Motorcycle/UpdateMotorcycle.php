<?php


namespace App\View\Motorcycle;


use App\Entity\Motorcycle\Motorcycle;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use App\Repository\MotorcycleRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Exception;

class UpdateMotorcycle
{
    use RenderHtml;
    use FlashMessage;

    private Motorcycle $motorcycle;
    private MotorcycleRepository $motorcycleRepository;
    private FilterSanitize $sanitize;

    public function __construct(Motorcycle $motorcycle, MotorcycleRepository $motorcycleRepository, FilterSanitize $sanitize)
    {
        $this->motorcycle = $motorcycle;
        $this->motorcycleRepository = $motorcycleRepository;
        $this->sanitize= $sanitize;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $idMotorcycle = $this->sanitize->int($_GET['motorcycle'], 'ID invalido');
            $this->motorcycle->setIdMotorcycle($idMotorcycle);

            $template = $this->render('motorcycle/new-motorcycle.php', [
                'title'             => 'Atualizar motocicleta',
                'attributeButton'   => 'update',
                'button'            => 'Atualizar motocicleta',
                'motorcycle'        => $this->motorcycleRepository->bringMotorcycle($this->motorcycle)
            ]);

            return new Response(200, [], $template);
        } catch ( Exception $error ) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/table-client']);
        }
    }
}