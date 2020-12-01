<?php

require_once __DIR__ . '/../../includes/header.php';

/**
 * @var \App\Entity\Client\Client $client
 */

if (isset($client) === TRUE) {
    $person = $client->getPerson();
    $address = $client->getAddress();
}

?>

    <a href="/client/table" class="btn btn-rollback">Voltar</a>

    <h4 class="text-center mb-3"> Adicionar Cliente </h4>

<?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

    <form method="POST" action="/save-client">

        <!-- Name & Identification -->
        <div class="form-row d-flex justify-content-center">
            <div class="form-group col-md-2">
                <label for="identification">CPF / CNPJ <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="identification" name="identification"
                       placeholder="CPF / CNPJ" value="<?= isset($client) ? $person->getIdentification() : '' ?>">
            </div>
            <div class="form-group col-md-5">
                <label for="name">Nome / Razão Social <span class="span-required">*</span></label>
                <input type="text" class="form-control" placeholder="Digite o (Nome/Razão Social) do cliente"
                       name="name" id="name" value="<?= isset($client) ? $person->getName() : '' ?>">
            </div>
        </div>

        <!-- Contact -->
        <div class="form-row d-flex justify-content-center">
            <div class="form-group col-md-2">
                <label for="phone_one">Telefone <span class="span-required">*</span></label>
                <input type="text" class="form-control telefone" placeholder="(XX) XXXX-XXXX" name="phone_one"
                       id="phone_one" value="<?= isset($client) ? $person->getPhoneOne() : '' ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPhone2">Telefone 2</label>
                <input type="text" class="form-control telefone" name="phone_two" id="inputPhone2"
                       placeholder="(XX) XXXX-XXXX" value="<?= isset($client) ? $person->getPhoneTwo() : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="email@email.com"
                       value="<?= isset($client) ? $person->getEmail() : '' ?>">
            </div>
        </div>

        <!-- Address -->
        <div class="form-row">

            <div class="form-group col-sm-2">
                <label for="cep">CEP <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="XX.XXX-XX"
                       value="<?= isset($client) ? $address->getCep() : '' ?>">
            </div>

            <div class="form-group col-sm-4">
                <label for="address">Endereço <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Exemplo: Av.Paulista"
                       value="<?= isset($client) ? $address->getStreet() : '' ?>">
            </div>

            <div class="form-group col-sm-1">
                <label for="number">Número <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="number" name="number" placeholder="Número"
                       value="<?= isset($client) ? $address->getNumber() : '' ?>">
            </div>

            <div class="form-group col-sm-2">
                <label for="complement">Complemento</label>
                <input type="text" class="form-control" id="complement" name="complement"
                       placeholder="Exemplo: Apto, Empresa, hotel etc."
                       value="<?= isset($client) ? $address->getComplement() : '' ?>">
            </div>

            <div class="form-group col-sm-2">
                <label for="city">Cidade <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Cidade."
                       value="<?= isset($client) ? $address->getCity() : '' ?>">
            </div>

            <div class="form-group col-sm-1">
                <label for="state">UF <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="state" name="state" maxlength="2"
                       value="<?= isset($client) ? $address->getState() : '' ?>">
            </div>

        </div>

        <input type="hidden" name="id" value="<?= isset($client) ? $client->getId() : ''; ?>">

        <button type="submit" class="btn btn-default w-100 mt-3">Salvar</button>

    </form>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>