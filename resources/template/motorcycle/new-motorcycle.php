<?php
require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php';

$currentUrl = $_SERVER['REQUEST_URI'];
/** @var \App\View\Motorcycle\UpdateMotorcycle | \App\View\Motorcycle\NewMotorcycle $attributeButton */
/** @var \App\View\Motorcycle\UpdateMotorcycle | \App\View\Motorcycle\NewMotorcycle $button */

?>

    <div class="border m-3 p-5 bg-light form-content">
        <h4 class="text-center m-4"> Dados da Motocicleta </h4>

        <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

        <form method="POST" action="/save-motorcycle">
            <div class="form-row">
                <!-- License Plate -->
                <div class="form-group col-md-1">
                    <label for="licensePlate">Emplacamento<span class="span-required">*</span> </label>
                    <input type="text" class="form-control" id="licensePlate" name="licensePlate"
                           placeholder="XXX-1234" value="<?= $motorcycle['license_plate'] ?? ''; ?>">
                </div>
                <!-- Motorcycle Brand -->
                <div class="form-group col-md-3">
                    <label for="brandMotorcycle"> Marca <span class="span-required">*</span></label>
                    <input type="text" class="form-control" name="brandMotorcycle" id="brandMotorcycle"
                           placeholder="Exemplo: Kawasaki" value="<?= $motorcycle['brand'] ?? ''; ?>">
                </div>
                <!-- Model -->
                <div class="form-group col-md-4">
                    <label for="modelMotorcycle"> Modelo <span class="span-required">*</span></label>
                    <input type="text" class="form-control" id="modelMotorcycle" name="modelMotorcycle"
                           placeholder="Exemplo: CBR 600." value="<?= $motorcycle['model'] ?? ''; ?>">
                </div>
                <!-- Engine -->
                <div class="form-group col-md-2">
                    <label for="engineMotorcycle"> Cilindrada <span class="span-required">*</span> </label>
                    <input type="text" class="form-control" id="engineMotorcycle" name="engineMotorcycle"
                           placeholder="Exemplo: 650CC." maxlength="4"
                           value="<?= $motorcycle['engine_capacity'] ?? ''; ?>">
                </div>
                <!-- KM Motorcycle -->
                <div class="form-group col-md-2">
                    <label for="kmMotorcycle"> Quilometro <span class="span-required">*</span></label>
                    <input type="text" class="form-control" id="kmMotorcycle" placeholder="Exemplo: 65.000 KM"
                           name="kmMotorcycle" value="<?= $motorcycle['kilometer'] ?? ''; ?>">
                </div>
            </div>

            <!-- Year Motorcycle -->
            <div class="form-row d-flex justify-content-center ">
                <!-- Manufacture year -->
                <div class="form-group col-md-3">
                    <label for="yearRegister">Ano Fabricação<span class="span-required">*</span></label>
                    <input type="text" class="form-control" id="yearRegister" name="yearMotorcycle"
                           placeholder="Ano de Fabricação" maxlength="4"
                           value="<?= $motorcycle['manufacture_year'] ?? ''; ?>">
                </div>
                <!-- Model year -->
                <div class="form-group col-md-3">
                    <label for="yearRegister">Ano do Modelo<span class="span-required">*</span></label>
                    <input type="text" class="form-control" id="yearRegister" name="yearMotorcycle"
                           placeholder="Ano do modelo" maxlength="4" value="<?= $motorcycle['model_year'] ?? ''; ?>">
                </div>
            </div>

            <input type="hidden" name="idClient" value="<?= $_GET['id']; ?>">
            <input type="hidden" name="idMotorcycle" value="<?= $_GET['motorcycle'] ?? ''; ?>">
            <input type="hidden" name="url" value="<?= $currentUrl; ?>"

            <!-- Button -->
            <button type="submit" class="btn btn-default w-100" name="<?= $attributeButton; ?>">
                <?= $button; ?>
            </button>

        </form>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script><?php require_once __DIR__ . '/../../../public/assets/js/cep&CpfVerify.js'; ?></script>
    <script><?php require_once __DIR__ . '/../../../public/assets/js/inputPhoneModel.js'; ?></script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>