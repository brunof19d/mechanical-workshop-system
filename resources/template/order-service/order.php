<?php
require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php';
require_once __DIR__ . '/../../includes/alert-message.php';

/** @var \App\View\OrderService\Order $order */
$date = new DateTimeImmutable($order['date_added']);

?>

    <div class="border bg-light form-content pl-5 pr-5 pb-5">

        <p><strong>Status:</strong> Na fila</p>

        <div class="order-date mt-5">
            <p class="">ORDEM DE SERVIÇO<strong class="ml-2"><?= $order['id_order']; ?></strong></p>
            <p class="">Hora: <?= $date->format('H:i:s'); ?> </p>
            <p class="">Data: <?= $date->format('d/m/Y'); ?></p>
        </div>

        <hr>

        <div class="order-client">
            <p class="mr-3"><strong
                        class="mr-2">Cliente:</strong><?= $order['firstname'] . ' ' . $order['lastname'] ?> </p>
            <p class="ml-3"><strong class="mr-2">CPF / CNPJ:</strong><?= $order['CPF_CNPJ']; ?></p>
        </div>

        <div class="order-contact">
            <p><strong class="mr-2">Telefone:</strong><?= $order['phone_one']; ?></p>
            <p><strong class="mr-2">Telefone 2:</strong><?= $order['phone_two']; ?></p>
            <p><strong class="mr-2">Email:</strong><?= $order['email']; ?></p>
        </div>

        <div class="order-address">
            <p>
                <strong class="mr-2">Endereço:</strong>
                <?= $order['address'] . ', ' . $order['number_address']; ?>
            </p>
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
            <p><strong class="mr-2">Cilindrada:</strong><?= $order['engine_capacity']; ?></p>
            <p>
                <strong class="mr-2">Ano:</strong><?= $order['manufacture_year'] . ' / ' . $order['model_year'] ?>
            </p>
            <p><strong class="mr-2">KM Atual:</strong><?= $order['kilometer']; ?></p>
        </div>

        <hr>

        <div class="text-nowrap">
            <strong class="mr-2">Problema informado pelo cliente:</strong>
            <p><?= $order['problem_motorcycle']; ?></p>
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

        <?php

//        print_r('<pre>');
//        var_dump($allProductsOrder);
//        print_r('</pre>');
//        die();



        ?>

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
            <?php /** @var \App\View\OrderService\Order$allProductsOrder */
            /** @var \App\Entity\Product\Product $product */
            foreach ($allProductsOrder as $product): ?>
                <tr>
                    <td><?= $product->getIdProduct(); ?></td>
                    <td><?= $product->getDescriptionProduct(); ?></td>
                    <td><?= $product->getValueUnit(); ?></td>
                    <td><?= $product->getAmount(); ?></td>
                    <td><?= $product->getValueTotal(); ?></td>
                    <td>X</td>
                </tr>
            <?php endforeach; ?>
            </tbody>

            <tfoot>
            <tr>
                <td><a class="btn btn-sm btn-success" href="/products-by-order?id=<?= $order['id_order']; ?>">Adicionar
                        item</a></td>
                <td></td>
                <td></td>
                <td class="bg-dark" style="color: white">Valor Total</td>
                <td><?= $allpriceOrder; ?> </td>
            </tr>
            </tfoot>
        </table>

        <a href="/save-order-service" class="btn btn-success w-100">Concluir ordem de serviço</a>

    </div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>