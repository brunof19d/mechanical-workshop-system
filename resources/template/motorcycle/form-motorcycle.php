<?php require_once __DIR__ . '/../../includes/header.php';

/**
 * @var \App\Entity\Motorcycle\Motorcycle $motorcycle
 * @var \App\View\Motorcycle\FormCreateMotorcycle | \App\View\Motorcycle\FormUpdateMotorcycle $button
 * @var \App\View\Motorcycle\FormCreateMotorcycle | \App\View\Motorcycle\FormUpdateMotorcycle $idClient
 */

?>

    <h4 class="text-center m-4">Dados da Motocicleta</h4>

<?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

    <form method="POST" action="/save-motorcycle">
        <div class="form-row">
            <!-- License Plate -->
            <div class="form-group col-md-2">
                <label for="license">Placa<span class="span-required">*</span> </label>
                <input type="text" class="form-control" id="license" name="license" placeholder="ABC-1234" maxlength="8"
                       value="<?= isset($motorcycle) ? $motorcycle->getLicensePlate() : ''; ?>">
            </div>
            <!-- Motorcycle Brand -->
            <div class="form-group col-md-4">
                <label for="brand">Marca<span class="span-required">*</span></label>
                <input type="text" class="form-control" name="brand" id="brand" placeholder="Exemplo: Kawasaki"
                       value="<?= isset($motorcycle) ? $motorcycle->getBrand() : ''; ?>">
            </div>
            <!-- Model -->
            <div class="form-group col-md-4">
                <label for="model">Modelo<span class="span-required">*</span></label>
                <input type="text" class="form-control" id="model" name="model" placeholder="Exemplo: CBR 600."
                       value="<?= isset($motorcycle) ? $motorcycle->getModel() : ''; ?>">
            </div>
            <!-- Engine -->
            <div class="form-group col-md-2">
                <label for="engine">Cilindrada<span class="span-required">*</span> </label>
                <input type="text" class="form-control" id="engine" name="engine" placeholder="Exemplo: 650CC."
                       maxlength="4" value="<?= isset($motorcycle) ? $motorcycle->getEngine() : ''; ?>">
            </div>
        </div>

        <!-- Year Motorcycle -->
        <div class="form-row d-flex justify-content-center ">
            <div class="form-group col-md-2">
                <label for="yearManufacture">Ano Fabricação<span class="span-required">*</span></label>
                <input type="text" class="form-control" id="yearManufacture" name="yearManufacture"
                       placeholder="Ano de Fabricação" maxlength="4"
                       value="<?= isset($motorcycle) ? $motorcycle->getYearManufacture() : ''; ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="yearModel">Ano do Modelo<span class="span-required">*</span></label>
                <input type="text" class="form-control" id="yearModel" name="yearModel" placeholder="Ano do modelo"
                       maxlength="4" value="<?= isset($motorcycle) ? $motorcycle->getYearModel() : ''; ?>">
            </div>
        </div>

        <input type="hidden" name="idClient" value="<?= $idClient; ?>">
        <input type="hidden" name="idMotorcycle" value="<?= isset($idMotorcycle) ? $idMotorcycle : ''; ?>">

        <button type="submit" class="btn btn-default w-100" name="<?= $button; ?>">Save</button>

    </form>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>