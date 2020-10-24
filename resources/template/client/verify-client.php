<?php require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php'; ?>

    <div class="bg-light form-content m3 p-5">
        <h4 class="text-center mb-3"> Dados Basicos do Cliente </h4>

        <form method="POST" action="/new-order" class="bg-light">

            <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

            <div class="form-group d-flex justify-content-center align-items-center">
                <label for="cpf_cnpj">CPF / CNPJ <span class="span-required mr-3">*</span></label>
                <input type="text" class="form-control w-25 mr-3" id="cpf_cnpj" name="cpf_cnpj" placeholder="XXX.XXX.XXX-XX">
                <button type="submit" class="btn btn-default">Avançar</button>

            </div>

        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script><?php require_once __DIR__ . '/../../../public/assets/js/cep&CpfVerify.js'; ?></script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>