<?php

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/content.php';
require_once __DIR__ . '/../../includes/alert-message.php';


/** @var \App\View\OrderService\Order $order */
/** @var \App\View\OrderService\Order $products */
/** @var \App\View\OrderService\Order $sumTotal */

$date = new DateTimeImmutable($order['date_added']);

?>

    <div class="border bg-light form-content pl-5 pr-5 pb-5">

        <!--  Header OS -->
        <div class="order-date mt-5">
            <p class="text-center"><strong class="mr-2">ORDEM DE SERVIÇO:</strong><?= $order['id_order']; ?></p>
            <p class="text-center"><strong class="mr-2">Hora:</strong><?= $date->format('H:i:s'); ?></p>
            <p class="text-center"><strong class="mr-2">Data:</strong><?= $date->format('d/m/Y'); ?></p>
            <p class="text-center"><strong class="mr-2">Status:</strong><?= $order['status_order']; ?></p>
        </div>

        <hr>

        <div class="order-client">
            <p class="mr-3"><strong
                        class="mr-2">Cliente:</strong></p>
            <p class="ml-3"><strong class="mr-2">CPF / CNPJ:</strong></p>
        </div>

        <div class="order-contact">
            <p><strong class="mr-2">Telefone:</strong></p>
            <p><strong class="mr-2">Telefone 2:</strong></p>
            <p><strong class="mr-2">Email:</strong></p>
        </div>

        <div class="order-address">
            <p><strong class="mr-2">Endereço:</strong></p>
            <p><strong class="mr-2">Complemento:</strong></p>
            <p><strong class="mr-2">Cidade:</strong></p>
            <p><strong class="mr-2">UF:</strong></p>
            <p><strong class="mr-2">CEP:</strong></p>
        </div>

        <hr>

        <div class="order-motorcycle">
            <p><strong class="mr-2">Emplacamento:</strong></p>
            <p><strong class="mr-2">Marca:</strong></p>
            <p><strong class="mr-2">Modelo:</strong></p>
        </div>

        <div class="order-motorcycle">
            <p><strong class="mr-2">Cilindrada:</strong></p>
            <p><strong class="mr-2">Ano:</strong></p>
            <p><strong class="mr-2">KM Atual:</strong></p>
        </div>

        <hr>

        <!-- Client considerations and motorcycle description -->
        <div>
            <strong class="mr-2">Problema informado pelo cliente:</strong>
            <p><?= $order['client_reported']; ?></p>
            <strong class="mr-2">Observações do estado da moto:</strong>
            <p><?= $order['description_motorcycle']; ?></p>
        </div>

        <hr>

        <div>
            <strong class="mr-2">Problema constatado:</strong> <a class="btn btn-sm btn-danger">Atualizar</a>
            <p>Exemplo: Motor de arranque quebrado.</p>
            <strong class="mr-2">Serviços executados:</strong> <a class="btn btn-sm btn-danger">Atualizar</a>
            <p>Exemplo: Foi trocada todas as peças danificada.</p>
        </div>

        <div>
            <p><strong class="mr-2">Mecanico Responsavel:</strong></p>
            <p><strong class="mr-2">Garantia:</strong></p>

        </div>

        <table class="table table-responsive-sm table-sm table-striped">
            <thead>
            <tr>
                <th>Referencia</th>
                <th>Descrição do item</th>
                <th>Valor unidade</th>
                <th>Unidade</th>
                <th>Valor Total</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $row): ?>
                <tr>
                    <td><?= $row['id_refproduct']; ?></td>
                    <td><?= $row['description']; ?></td>
                    <td>R$ <?= $row['value']; ?></td>
                    <td><?= $row['amount']; ?></td>
                    <td>R$ <?= $row['value_total']; ?></td>
                    <td><a class="btn btn-danger btn-sm" href="">X</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>

            <tfoot>
            <tr>
                <td>
                    <a class="btn btn-sm btn-success" href="/products-by-order?id=<?= $order['id_order']; ?>">
                        Adicionar item
                    </a>
                </td>
                <td></td>
                <td></td>
                <td class="bg-dark" style="color: white">Valor Total</td>
                <td>R$ <?= $sumTotal ?></td>
            </tr>
            </tfoot>
        </table>

        <a href="/save-order-service" class="btn btn-success w-100">Concluir ordem de serviço</a>

    </div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>