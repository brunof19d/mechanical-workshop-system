<?php require_once __DIR__ . '/../../includes/header.php';

/**
 * @var \App\View\Motorcycle\ClientMotorcycle $motorcycles
 * @var \App\Entity\Motorcycle\Motorcycle $motorcycle
 * @var \App\View\Motorcycle\ClientMotorcycle $idClient
 */

?>

    <h5 class="text-center"><strong> Motocicletas associadas ao cliente</strong></h5>

    <div class="d-flex justify-content-start align-items-center m-3">
        <a href="/client?id=<?= $idClient; ?>" class="btn btn-rollback mr-2">Voltar</a>
        <a href="/client/motorcycle/add?id=<?= $idClient; ?>" class="btn btn-default ml-2">Adicionar Motocicleta</a>
    </div>

<?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

    <div id="loop-hr"  class="mt-5" style="font-size: 20px">

        <?php if (empty($motorcycles)): ?>
            <p style="font-size: 20px; color: red"><u>Não existe motos associadas a esse cliente.</u></p>
        <?php else: ?>

            <?php foreach ($motorcycles as $motorcycle): ?>
                <div class="row d-flex align-items-center">
                    <div class="col-md-3">
                        <p><strong class="mr-2">Emplacamento:</strong><?= $motorcycle->getLicensePlate(); ?></p>
                        <p><strong class="mr-2">Marca:</strong><?= $motorcycle->getBrand(); ?></p>
                        <p><strong class="mr-2">Modelo:</strong><?= $motorcycle->getModel(); ?></p>
                        <p><strong class="mr-2">Ano Fabricação:</strong><?= $motorcycle->getYearManufacture(); ?></p>
                        <p><strong class="mr-2">Ano Modelo:</strong><?= $motorcycle->getYearModel(); ?></p>
                        <p><strong class="mr-2">Cilindrada:</strong><?= $motorcycle->getEngine() . 'CC'; ?></p>
                    </div>
                    <div class="col-md-4">
                        <a href="/client/motorcycle/update?motorcycle=<?=$motorcycle->getId();?>&client=<?=$idClient?>"
                           class="btn btn-info">Atualizar dados
                        </a>
                        <a href="/remove-motorcycle?id=<?= $motorcycle->getId(); ?>" class="btn btn-danger">
                            Remover motocicleta
                        </a>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>

        <?php endif; ?>

    </div>


<?php require_once __DIR__ . '/../../includes/footer.php';