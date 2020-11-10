<?php


namespace App\View\OrderService;


use App\Entity\OrderService\OrderService;
use App\Helper\FilterSanitize;
use App\Helper\FlashMessage;
use App\Helper\RenderHtml;
use App\Repository\OrderServiceRepository;
use Exception;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class UpdateNotes implements RequestHandlerInterface
{
    use RenderHtml;
    use FlashMessage;

    private FilterSanitize $sanitize;
    private OrderService $order;
    private OrderServiceRepository $repository;

    public function __construct(FilterSanitize $sanitize, OrderService $order, OrderServiceRepository $repository)
    {
        $this->sanitize = $sanitize;
        $this->order = $order;
        $this->repository = $repository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = $request->getQueryParams();
            $id = $this->sanitize->int($data['id'], 'ID O.S Invalido');

            $this->order->setIdOrder($id);

            $template = $this->render('order-service/update-note.php', [
                'title' => 'Atualizar observações O.S',
                'dataOrder' => $this->repository->bringNotesOrder($this->order)
            ]);
            return new Response(200, [], $template);
        } catch (Exception $error) {
            echo 'Error: ' . $this->alertMessage('danger', $error->getMessage());
            return new Response(302, ['Location' => '/table-order']);
        }
    }
}