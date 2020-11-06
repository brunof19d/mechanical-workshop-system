<?php

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/content.php';
require_once __DIR__ . '/../../includes/alert-message.php';

?>


<div class="border m-3 p-5 bg-light form-content">

    <h4 class="text-center mb-3"> PEÇAS CADASTRADAS NO SISTEMA </h4>

    <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

    <form method="POST" action="/save-products-order">

        <input type="hidden" name="idOrder" value="<?= $idOrder; ?>">

            <div class="col-lg-12">
                <label for="select-product">Nome Produto:</label>
                <select id="select-product" name="productSystem">
                    <option value="" selected disabled>Escolha um produto</option>
                    <?php foreach ($allProducts as $product): ?>
                        <option value="<?= $product['id_product'] ?>"><?= $product['description']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-lg-2">
                <label for="inputAmount">Quantidade:</label>
                <input type="number" class="form-control" name="amount" id="inputAmount" placeholder="Quantidade">
            </div>


        <button type="submit" class="btn btn-default w-100 mt-3" name="form1">Incluir produto</button>

    </form>
</div>

<div class="border m-3 p-5 bg-light form-content">

    <form method="POST" action="/save-client">

        <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

        <h4 class="text-center mb-3"> PEÇAS NÃO CADASTRADAS NO SISTEMA </h4>
        <p style="font-size: 12px">Cadastre-se aqui produtos e peças que vão entrar para o orçamento, porem não
            serão registradas no sistema.
            Exemplo: Peças de concessionaria, peças que o cliente trouxe por conta própria etc.
        </p>

        <div class="form-row">

            <div class="form-group col-lg-6">
                <label for="inputDescription">Descrição produto:</label>
                <input type="text" class="form-control" id="inputDescription"
                       placeholder="Digite o nome do produto">
            </div>

            <div class="form-group col-lg-4">
                <label for="inputValue">Valor produto:</label>
                <input type="text" class="form-control" id="inputValue" placeholder="R$ 0,00">
            </div>

            <div class="form-group col-lg-2">
                <label for="inputAmount">Quantidade:</label>
                <input type="number" class="form-control" id="inputAmount" placeholder="Quantidade">
            </div>

        </div>

        <button type="submit" class="btn btn-default w-100 mt-3">Incluir produto</button>

    </form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>

