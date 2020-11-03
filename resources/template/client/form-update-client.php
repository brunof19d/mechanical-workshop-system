<?php

require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php';


?>

<div class="border m-3 p-5 bg-light form-content">

    <form method="POST" action="/save-client">

        <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

        <input type="hidden" name="update" value="<?= 'update' ?>">
        <input type="hidden" name="cpf_cnpj" value="<?= $client['CPF_CNPJ']; ?>">

        <a href="/table-client" class="btn btn-rollback">Voltar</a>

        <h4 class="text-center mb-3"> Atualizar dados do Cliente </h4>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Nome <span class="span-required">*</span></label>
                <input type="text" class="form-control" name="first_name" id="inputName" placeholder="Nome" value="<?= $client['firstname']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputLastname">Sobrenome <span class="span-required">*</span></label>
                <input type="text" class="form-control" name="last_name" id="inputLastname" placeholder="Sobrenome" value="<?= $client['lastname']; ?>">
            </div>
        </div>

        <!-- Contact -->
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputPhone">Telefone <span class="span-required">*</span></label>
                <input type="text" class="form-control telefone" name="phone" id="inputPhone"
                       placeholder="(XX) XXXX-XXXX" onkeypress="$('.telefone').maskbrphone();" value="<?= $client['phone_one']; ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPhone2">Telefone 2</label>
                <input type="text" class="form-control telefone" name="phone_two" id="inputPhone2"
                       placeholder="(XX) XXXX-XXXX" onkeypress="$('.telefone').maskbrphone();" value="<?= $client['phone_two']; ?>">
            </div>
            <div class="form-group col-md-8">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="email@email.com" value="<?= $client['email']; ?>">
            </div>
        </div>
        <hr>
        <!-- Address -->
        <div class="form-row">

            <div class="form-group col-sm-2">
                <label for="cep">CEP <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="XX.XXX-XX" value="<?= $client['cep']; ?>">
            </div>

            <div class="form-group col-sm-4">
                <label for="endereco">Endereço <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Exemplo: Av.Paulista" value="<?= $client['address']; ?>">
            </div>

            <div class="form-group col-sm-1">
                <label for="numero">Número <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Número" value="<?= $client['number_address']; ?>">
            </div>

            <div class="form-group col-sm-2">
                <label for="complemento">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Exemplo: Apto, Empresa, hotel etc." value="<?= $client['comp_address']; ?>">
            </div>

            <div class="form-group col-sm-2">
                <label for="cidade">Cidade <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="<?= $client['city']; ?>">
            </div>

            <div class="form-group col-sm-1">
                <label for="uf">UF <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="uf" name="uf" maxlength="2" value="<?= $client['state']; ?>">
            </div>

        </div>

        <input type="hidden" name="url" value="<?= $url ?>">

        <button type="submit" class="btn btn-default w-100 mt-3">Atualizar Cliente</button>

    </form>

</div>

<script src="assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script><?php require_once __DIR__ . '/../../../public/assets/js/cep&CpfVerify.js'; ?></script>
<script><?php require_once __DIR__ . '/../../../public/assets/js/inputPhoneModel.js'; ?></script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
