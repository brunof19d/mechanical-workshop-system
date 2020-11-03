<?php
require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php';

/** @var \App\View\OrderService\NewOrderStepTwo $allMotorcycle */

?>

<div class="border m-3 p-5 bg-light form-content">

    <h4 class="text-center m-4"> Descrição da ordem de serviço</h4>

    <form method="POST" action="/new-os-step3">

        <div class="form-group">
            <label>Motocicleta</label>
            <select class="form-control" name="idMotorcycle">
                <option disabled selected>Escolher motocicleta</option>
                <?php foreach ($allMotorcycle as $motorcycle): ?>
                    <option value="<?= $motorcycle['id_motorcycle']; ?>">
                        <?= $motorcycle['license_plate'] . ' / ' . $motorcycle['brand'] . ' / ' . $motorcycle['model']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="problemsMotorycle"> Problemas informados pelo cliente </label>
            <textarea class="form-control" id="problemsMotorycle" name="problem"
                      placeholder="Exemplo: Barulho no motor, problema no cambio, etc."
                      rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="descriptionMotorycle"> Observações da moto </label>
            <textarea class="form-control" id="descriptionMotorycle" name="description"
                      placeholder="Exemplo: Moto chegou a oficina com carenagem esquerda riscada, roda dianteira amassada, etc."
                      rows="3"></textarea>
        </div>

        <input type="hidden" name="idClient" value="<?= $_GET['id']; ?>">

        <button type="submit" class="btn btn-default w-100 mt-3">Avançar</button>

    </form>

</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
