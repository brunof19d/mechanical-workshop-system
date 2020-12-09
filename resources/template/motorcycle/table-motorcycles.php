<?php require_once __DIR__ . '/../../includes/header.php';

/**
 * @var \App\View\Motorcycle\TableMotorcycles $motorcycles
 * @var \App\Entity\Motorcycle\Motorcycle $motorcycle
 */

?>

    <h5 class="text-center"><strong>Motocicletas cadastradas no sistema</strong></h5>

    <div class="form-group mt-3">
        <input type="text" id="filter-table" class="form-control border-dark" placeholder="Digite a placa da motocicleta">
    </div>

    <table class="table table-bordered table-striped table-responsive-xl border w-100">
        <thead>
        <tr>
            <th>Placa</th>
            <th>Marca / Modelo</th>
            <th style="width: 20%" class="text-center">#</th>
            <th style="width: 20%" class="text-center">#</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($motorcycles as $motorcycle): ?>
            <tr class="client">
                <td class="info-name"><?= $motorcycle->getLicensePlate(); ?></td>
                <td class="info-id"><?= $motorcycle->getBrand() . ' / ' . $motorcycle->getModel(); ?></td>
                <td class="text-center">
                    <a href="/client?id=<?= $motorcycle->getClient()->getId(); ?>" target="_blank" class="btn btn-info">
                        Informações clientes
                    </a>
                </td>
                <td class="text-center">
                    <a class="btn btn-info" href="/client/motorcycle?id=<?= $motorcycle->getClient()->getId();?>" target="_blank">
                        Informações motocicleta
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php require_once __DIR__ . '/../../includes/footer.php';