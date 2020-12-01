<?php

require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/navbar.php';
/** @var \App\View\Motorcycle\ClientMotorcycle $idClient */
/** @var \App\View\Motorcycle\ClientMotorcycle $allMotorcycle */

?>

    <div class="border m-3 p-5 bg-light form-content">

        <h5 class="text-center"><strong> Motocicletas do cliente: </strong></h5>

        <div class="d-flex justify-content-center align-items-center m-3">
            <a href="/table-client" class="btn btn-rollback mr-2">Voltar</a>
            <a href="/new-motorcycle?id=<?= $idClient; ?>" class="btn btn-success ml-2">Adicionar Motocicleta</a>
        </div>

        <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

        <hr>

        <div id="loop-hr" style="font-size: 20px">
            <?php if (count($allMotorcycle) === 0): ?>
                <p style="font-size: 20px; color: red"><u>Não existe motos associadas a esse cliente.</u></p>
            <?php else: ?>
                <?php foreach ($allMotorcycle as $motorcycle): ?>
                    <div class="d-flex justify-content-center">
                        <a href="/update-motorcycle?id=<?= $idClient; ?>&motorcycle=<?= $motorcycle['id_motorcycle']; ?>"
                           class="btn btn-info mr-2">Atualizar dados</a>
                        <a href="/remove-motorcycle?id=<?= $idClient; ?>&motorcycle=<?= $motorcycle['id_motorcycle']; ?>"
                           class="btn btn-danger ml-2">Remover motocicleta</a>
                    </div>
                    <p><strong class="mr-2">Emplacamento:</strong><?= $motorcycle['license_plate']; ?></p>
                    <p><strong class="mr-2">Marca:</strong><?= $motorcycle['brand']; ?></p>
                    <p><strong class="mr-2">Modelo:</strong><?= $motorcycle['model']; ?></p>
                    <p><strong class="mr-2">Ano Fabricação:</strong><?= $motorcycle['manufacture_year']; ?></p>
                    <p><strong class="mr-2">Ano Modelo:</strong><?= $motorcycle['model_year']; ?></p>
                    <p><strong class="mr-2">Cilindrada:</strong><?= $motorcycle['engine_capacity'] . 'CC'; ?></p>
                    <p><strong class="mr-2">Quilometro:</strong><?= $motorcycle['kilometer'] . 'km'; ?></p>
                    <hr>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>

<?php require_once __DIR__ . '/../../includes/footer.php';