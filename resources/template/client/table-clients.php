<?php require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php'; ?>


<table class="table table-bordered table-striped table-responsive-xl border w-100">

    <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

    <thead>
    <tr>
        <th>Nome / Razão Social</th>
        <th>CPF / CNJPJ </th>
        <th>Contato</th>
        <th>Informações</th>
        <th>Motocicleta</th>
    </tr>
    </thead>

    <tbody>
    <?php /** @var \App\View\Client\TableClients $allClients */
        foreach ($allClients as $client): ?>
        <tr class="">
            <td><?= $client['firstname'] . ' ' . $client['lastname']; ?></td>
            <td style="width: 20%"><?= $client['CPF_CNPJ']; ?></td>
            <td style="width: 20% "><?= $client['phone_one']; ?></td>
            <td style="width: 10%" class="text-center">
                <a class="btn btn-info" href="/single-client?id=<?= $client['id']; ?>">Ver Mais</a>
            </td>
            <td style="width: 10%;"  class="text-center">
                <a class="btn btn-success" href="/motorcycle-client?id=<?= $client['id']; ?>">Ver Detalhes</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
