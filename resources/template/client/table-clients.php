<?php

require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php';
require_once __DIR__ . '/../../includes/alert-message.php';

/** @var \App\View\Client\TableClients $allClients */

?>

<h4 class="text-center">Tabela com todos clientes registrados no sistema.</h4>

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
        <th class="text-center">Motocicleta</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($allClients as $client): ?>
        <tr class="client">
            <td class="info-name"><?= $client['firstname'] . ' ' . $client['lastname']; ?></td>
            <td class="info-id" style="width: 20%"><?= $client['CPF_CNPJ']; ?></td>
            <td style="width: 20% "><?= $client['phone_one']; ?></td>
            <td style="width: 10%" class="text-center">
                <a class="btn btn-info" href="/client?id=<?= $client['id']; ?>">Ver Mais</a>
            </td>
            <td style="width: 10%;"  class="text-center">
                <a class="btn btn-success" href="/motorcycle-client?id=<?= $client['id']; ?>">Detalhes</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script><?php require_once __DIR__ . '/../../../public/assets/js/filterTableClient.js'; ?></script>