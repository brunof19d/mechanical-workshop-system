<?php

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/content.php';

/** @var \App\View\OrderService\UpdateNotes $dataOrder */

?>

    <div class="border m-3 p-5 bg-light form-content">

        <form method="POST" action="/update-note">

            <div class="d-flex justify-content-center align-items-center">
                <h4 class="text-center mr-2"> Atualizar Oberservações </h4>
                <a href="/order?id=<?= $dataOrder['id_order'];?>" class="btn btn-danger btn-sm ml-2">Voltar</a>
            </div>

            <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

            <div class="form-group">
                <label for="problemsMotorycle">Problemas informados pelo cliente:</label>
                <textarea class="form-control" id="problemsMotorycle" name="problem"
                          placeholder="Exemplo: Barulho no motor, problema no cambio, etc."
                          rows="3"><?= $dataOrder['client_reported'] ?></textarea>
            </div>

            <div class="form-group">
                <label for="descriptionMotorycle">Observações da moto:</label>
                <textarea class="form-control" id="descriptionMotorycle" name="description"
                          placeholder="Exemplo: Moto chegou a oficina com carenagem esquerda riscada, roda dianteira amassada, etc."
                          rows="3"><?= $dataOrder['description_motorcycle']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="problemFound">Problema constatado:</label>
                <textarea class="form-control" id="problemFound" name="found"
                          placeholder="Exemplo: Pastilha de freio desgatada."
                          rows="3"><?= $dataOrder['problem_found']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="serviceExecuted">Serviços executados:</label>
                <textarea class="form-control" id="serviceExecuted" name="service"
                          placeholder="Exemplo: Trocado par de pastilha de freio."
                          rows="3"><?= $dataOrder['executed_services']; ?></textarea>
            </div>

            <input type="hidden" name="idOrder" value="<?= $dataOrder['id_order']; ?>">

            <button type="submit" class="btn btn-default w-100 mt-3">Incluir produto</button>

        </form>

    </div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>