<?php

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/alert-message.php';

/** @var \App\View\OrderService\TableServiceOrders $allServiceOrder */

?>

<h4 class="text-center">Tabela com todas ordens de serviço registradas no sistema.</h4>

<div class="form-group mt-3">
    <input type="text" id="filter-table" class="form-control border-dark" placeholder="Digite o nome do cliente ou CPF / CNJPJ">
</div>

<table class="table table-bordered table-striped table-responsive-xl border w-100">
    <thead>
    <tr>
        <th>Número O.S</th>
        <th>Nome / Razão Social</th>
        <th>CPF / CNPJ</th>
        <th>Moto</th>
        <th class="text-center">Status</th>
        <th class="text-center">Detalhes</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($allServiceOrder as $order): ?>
        <tr class="client">
            <td style="width: 10%;">
                <?= $order['id_order']; ?>
            </td>
            <td class="info-name"><?= $order['firstname'] . ' ' . $order['lastname']; ?></td>
            <td style="width: 12%;" class="info-id">
                <?= $order['CPF_CNPJ']; ?>
            </td>
            <td style="width: 18%;">
                <?= $order['license_plate'] . ' / ' . $order['brand'] . ' / ' . $order['model']; ?>
            </td>
            <td class="text-center">
                <?= $order['status_order']; ?>
            </td>
            <td style="width: 10%" class="text-center">
                <a href="/order?id=<?= $order['id_order']; ?>" class="btn btn-success">O.S Completa</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script><?php require_once __DIR__ . '/../../../public/assets/js/filterTableClient.js'; ?></script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
