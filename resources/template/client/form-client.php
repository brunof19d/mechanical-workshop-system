<?php require_once __DIR__ . '/../../includes/header.php';

/**
 * @var \App\Entity\Client\Client $client
 * @var \App\View\Client\FormUpdateClient | \App\View\Client\FormCreateClient $action
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
                <input type="text" class="form-control" placeholder="Digite o (Nome/Razão Social)"
                       name="name" id="name" value="<?= isset($client) ? $person->getName() : '' ?>">
            </div>
        </div>
        <!-- End Name & Identification -->
        <!-- Contact -->
        <div class="form-row d-flex justify-content-center">
            <div class="form-group col-md-2">
                <label for="phone_one">Telefone <span class="span-required">*</span></label>
                <input type="text" class="form-control" placeholder="(11) 91111-1111" name="phone_one"
                       id="phone_one" value="<?= isset($client) ? $person->getPhoneOne() : '' ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="phone_two">Telefone 2</label>
                <input type="text" class="form-control telefone" name="phone_two" id="phone_two"
                       placeholder="(11) 5555-1111" value="<?= isset($client) ? $person->getPhoneTwo() : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail">Email <span class="span-required">*</span></label>
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="email@email.com"
                       value="<?= isset($client) ? $person->getEmail() : '' ?>">
            </div>
        </div>
        <!-- End Contact -->
        <hr>
        <!-- Address -->
        <div class="form-row d-flex justify-content-center">
            <div class="form-group col-sm-2">
                <label for="cep">CEP <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-100"
                       value="<?= isset($client) ? $address->getCep() : '' ?>">
            </div>

            <div class="form-group col-sm-4">
                <label for="address">Endereço <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Digite o endereço"
                       value="<?= isset($client) ? $address->getStreet() : '' ?>">
            </div>

            <div class="form-group col-sm-1">
                <label for="number">Número <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="number" name="number" placeholder="Número"
                       value="<?= isset($client) ? $address->getNumber() : '' ?>">
            </div>

            <div class="form-group col-sm-4">
                <label for="complement">Complemento</label>
                <input type="text" class="form-control" id="complement" name="complement"
                       placeholder="Ex: Apto, Empresa, hotel etc."
                       value="<?= isset($client) ? $address->getComplement() : '' ?>">
            </div>
        </div>

        <div class="form-row d-flex justify-content-center">
            <div class="form-group col-sm-4">
                <label for="neighborhood">Bairro <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Digite o bairro"
                       value="<?= isset($client) ? $address->getNeighborhood() : '' ?>">
            </div>

            <div class="form-group col-sm-4">
                <label for="city">Cidade <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Digite a cidade"
                       value="<?= isset($client) ? $address->getCity() : '' ?>">
            </div>

            <div class="form-group col-sm-1">
                <label for="uf">UF <span class="span-required">*</span></label>
                <input type="text" class="form-control" id="uf" name="state" maxlength="2" placeholder="SP"
                       value="<?= isset($client) ? $address->getState() : '' ?>">
            </div>
        </div>
        <!-- End Address -->

        <input type="hidden" name="id" value="<?= isset($client) ? $client->getId() : ''; ?>">
        <button type="submit" name="<?= $action; ?>" class="btn btn-default w-100 mt-3">Salvar</button>
    </form>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="/assets/jquery/jquery.mask.min.js"></script>
    <script src="/assets/js/mask.js"></script>
    <script src="/assets/js/cep.js"></script>


<?php require_once __DIR__ . '/../../includes/footer.php'; ?>