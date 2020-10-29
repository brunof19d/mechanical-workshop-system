<?php require_once __DIR__ . '/../../includes/header.php'; require __DIR__ . '/../../includes/content.php'; ?>

<table class="table table-bordered table-striped table-responsive-xl border">

    <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

    <thead>
    <tr>
        <th>Nome / Razão Social</th>
        <th>CPF / CNJPJ </th>
        <th>Cliente adicionado</th>
        <th class="text-center">Motocicleta</th>
        <th class="text-center">#</th>
    </tr>
    </thead>

    <tbody>
    <?php /** @var \App\View\Client\TableClients $allClients */
    foreach ($allClients as $client): ?>
        <tr class="">
            <td><?= $client['firstname'] . ' ' . $client['lastname']; ?></td>
            <td style="width: 20%"><?= $client['CPF_CNPJ']; ?></td>
            <td style="width: 20% ">
                <?= date("d/m/Y", strtotime($client['added'])) . ' às ' . date("H:i:s A", strtotime($client['added'])); ?>
            </td>
            <td class="text-center">
                <select>
                    <option selected disabled>Escolher motocicleta</option>
                    <option>XXX-XXXX / HONDA / CBR / 600 CC</option>
                </select>
            </td>
            <td style="width: 10%;"  class="text-center">
                <a class="btn btn-success btn-sm" href="/description-order-service">Avançar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
