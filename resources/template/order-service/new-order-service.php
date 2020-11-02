<?php
require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php';
require_once __DIR__ . '/../../includes/alert-message.php';

/** @var \App\View\Client\TableClients $allClients */
?>

<table class="table table-bordered table-striped table-responsive-xl border">

    <thead>
    <tr>
        <th>Nome / Razão Social</th>
        <th>CPF / CNJPJ </th>
        <th>Cliente adicionado</th>
        <th class="text-center">#</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($allClients as $client): ?>
        <tr class="">
            <td><?= $client['firstname'] . ' ' . $client['lastname']; ?></td>
            <td style="width: 20%"><?= $client['CPF_CNPJ']; ?></td>
            <td style="width: 20% ">
                <?= date("d/m/Y", strtotime($client['added'])) . ' às ' . date("H:i:s A", strtotime($client['added'])); ?>
            </td>
            <td style="width: 10%;"  class="text-center">
                <a class="btn btn-success btn-sm" href="/description-order-service?id=<?= $client['id']; ?>">Avançar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
