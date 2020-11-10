<?php

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/content.php';

/** @var \App\View\OrderService\Order $order */
/** @var \App\View\OrderService\Order $products */
/** @var \App\View\OrderService\Order $sumTotal */
/** @var \App\View\OrderService\Order $externalProducts */
/** @var \App\View\OrderService\Order $sumExternalProducts */

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
            <p class="mr-3"><strong class="mr-2">Cliente:</strong><?= $order['firstname'] . ' ' . $order['lastname'] ?></p>
            <p class="ml-3"><strong class="mr-2">CPF / CNPJ:</strong><?= $order['CPF_CNPJ']; ?></p>
        </div>
        <div class="order-contact">
            <p><strong class="mr-2">Telefone:</strong><?= $order['phone_one']; ?></p>
            <p><strong class="mr-2">Telefone 2:</strong><?= $order['phone_two']; ?></p>
            <p><strong class="mr-2">Email:</strong><?= $order['email']; ?></p>
        </div>
        <div class="order-address">
            <p><strong class="mr-2">Endereço:</strong><?= $order['address'] . ', ' . $order['number_address']; ?></p>
            <p><strong class="mr-2">Complemento:</strong><?= $order['comp_address']; ?></p>
            <p><strong class="mr-2">Cidade:</strong><?= $order['city']; ?></p>
            <p><strong class="mr-2">UF:</strong><?= $order['state']; ?></p>
            <p><strong class="mr-2">CEP:</strong><?= $order['cep']; ?></p>
        </div>
        <hr>
        <div class="order-motorcycle">
            <p><strong class="mr-2">Emplacamento:</strong><?= $order['license_plate']; ?></p>
            <p><strong class="mr-2">Marca:</strong><?= $order['brand']; ?></p>
            <p><strong class="mr-2">Modelo:</strong><?= $order['model']; ?></p>
        </div>
        <div class="order-motorcycle">
            <p><strong class="mr-2">Cilindrada:</strong><?= $order['engine_capacity']; ?>CC</p>
            <p><strong class="mr-2">Ano:</strong><?= $order['manufacture_year'] . '-' . $order['model_year']; ?></p>
            <p><strong class="mr-2">KM Atual:</strong><?= $order['kilometer']; ?>km</p>
        </div>
        <!--  End Header OS -->

        <!-- Observations on the bike, customer report and summary of the service performed -->
        <hr id="request">
        <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>
        <div>
            <div class="d-flex justify-content-center ">
                <a class="btn btn-sm btn-info" href="/notes-order?id=<?=$order['id_order'];?>">Atualizar Observações</a>
            </div>
            <p><strong class="mr-2">Problema informado pelo cliente:</strong><?= $order['client_reported']; ?></p>
            <p><strong class="mr-2">Observações do estado da moto:</strong><?= $order['description_motorcycle']; ?></p>
            <p><strong class="mr-2">Problema constatado:</strong><?= $order['problem_found']; ?></p>
            <p><strong class="mr-2">Serviços executados:</strong><?= $order['executed_services']; ?></p>
        </div>
        <!-- End Section -->

        <!-- Table Products system -->
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
                    <td><a class="btn btn-danger btn-sm" href="/remove-product-order?id=<?= $order['id_order']; ?>&product=<?= $row['idproducts_by_order']; ?>">X</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <?php if (empty($products) === FALSE): ?>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><strong style="color: green">Total</strong></td>
                    <td><strong style="color: green;">R$ <?= $sumTotal ?></strong></td>
                <?php else: ?>
                <td style="color: red">Não ha produtos adicionados na ordem de serviço</td>
            </tr>
            </tfoot>
            <?php endif; ?>
        </table>
        <a class="btn btn-sm btn-success" href="/products-by-order?id=<?= $order['id_order']; ?>">Adicionar item</a>
        <!-- End Table Products system -->

        <!-- Table Products External -->
        <p class="h5 text-center m-5" style="font-style: italic">
            <u>Peças externas da oficina - Exemplo: Peças de concessionária e peças que o cliente tenha trago.</u>
        </p>
        <table class="table table-responsive-sm table-sm table-striped">
            <thead>
            <tr>
                <th></th>
                <th>Descrição do item</th>
                <th>Valor unidade</th>
                <th>Unidade</th>
                <th>Valor Total</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($externalProducts as $row): ?>
                <tr>
                    <td></td>
                    <td><?= $row['description']; ?></td>
                    <td>R$ <?= $row['value_unit']; ?></td>
                    <td><?= $row['amount']; ?></td>
                    <td>R$ <?= $row['value_total']; ?></td>
                    <td><a class="btn btn-danger btn-sm" href="/remove-external?id=<?= $order['id_order']; ?>&product=<?= $row['id']; ?>">X</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <?php if (empty($externalProducts) === FALSE): ?>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><strong style="color: green">Total</strong></td>
                    <td><strong style="color: green;">R$ <?= $sumExternalProducts ?></strong></td>
                <?php else: ?>
                    <td style="color: red">Não ha produtos adicionados na ordem de serviço</td>
                <?php endif; ?>
            </tr>
            </tfoot>
        </table>
        <a class="btn btn-sm btn-success" href="/products-external?id=<?= $order['id_order']; ?>">Adicionar item</a>
        <!-- End Table Products External -->

        <!-- Button finished O.S -->
        <div class="m-5">
            <hr style="border-bottom: 1px solid black">
            <a href="/save-order-service" class="btn btn-success w-100">Concluir ordem de serviço</a>
        </div>

    </div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>