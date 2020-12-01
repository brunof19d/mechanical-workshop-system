<?php

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/alert-message.php';

/**
 * @var \App\Entity\Client\Client $client
 * @var \App\View\Client\TableClients $allClients
 */

?>

<div class="form-group mt-3">
    <input type="text" id="filter-table" class="form-control border-dark" placeholder="Digite o nome do cliente ou CPF / CNJPJ">
</div>

<table class="table table-bordered table-striped table-responsive-xl border w-100">
    <thead>
    <tr>
        <th>Nome / Razão Social</th>
        <th>CPF / CNJPJ </th>
        <th>Contato</th>
        <th class="text-center">Informações</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($allClients as $client): ?>
            <tr class="client">
                <td class="info-name"><?= $client->getPerson()->getName(); ?></td>
                <td class="info-id"><?= $client->getPerson()->getIdentification(); ?></td>
                <td><?= $client->getPerson()->getPhoneOne(); ?></td>
                <td class="text-center">
                    <a class="btn btn-info" href="/client?id=<?= $client->getId() ?>">Ver Mais</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>