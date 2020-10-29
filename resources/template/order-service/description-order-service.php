<?php require_once __DIR__ . '/../../includes/header.php'; require __DIR__ . '/../../includes/content.php'; ?>

<div class="border m-3 p-5 bg-light form-content">

    <h4 class="text-center m-4"> Descrição da ordem de serviço </h4>

    <form method="POST">

        <div class="form-group">
            <label for="problemsMotorycle"> Problemas informados pelo cliente </label>
            <textarea class="form-control" id="problemsMotorycle"
                      placeholder="Exemplo: Barulho no motor, problema no cambio, etc."
                      rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="descriptionMotorycle"> Observações da moto </label>
            <textarea class="form-control" id="descriptionMotorycle"
                      placeholder="Exemplo: Moto chegou a oficina com carenagem esquerda riscada, roda dianteira amassada, etc."
                      rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-default w-100 mt-3">Avançar</button>

    </form>

</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
