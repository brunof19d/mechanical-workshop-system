<?php

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/content.php';

?>

<div class="border m-3 p-5 bg-light form-content">

    <form method="POST" action="/save-products-ext">

        <div class="d-flex justify-content-center align-items-center">
            <h4 class="text-center mr-2"> PEÇAS NÃO CADASTRADAS NO SISTEMA </h4>
            <a href="/order?id=<?= $idOrder; ?>" class="btn btn-danger btn-sm ml-2">Voltar</a>
        </div>

        <p style="font-size: 12px">Cadastre-se aqui produtos e peças que vão entrar para o orçamento, porem não
            serão registradas no sistema.
            Exemplo: Peças de concessionaria, peças que o cliente trouxe por conta própria etc.
        </p>

        <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

        <div class="form-row">

            <div class="form-group col-lg-6">
                <label for="inputDescription">Descrição produto:</label>
                <input type="text" class="form-control" id="inputDescription" name="description" placeholder="Digite o nome do produto">
            </div>

            <div class="form-group col-lg-4">
                <label for="value">Valor produto:</label>
                <input type="text" class="money form-control" id="value" name="value" placeholder="R$ 0,00">
            </div>

            <div class="form-group col-lg-2">
                <label for="inputAmount">Quantidade:</label>
                <input type="number" class="form-control" id="inputAmount" name="amount" placeholder="Quantidade">
            </div>

        </div>

        <input type="hidden" name="idOrder" value="<?= $idOrder; ?>">

        <button type="submit" class="btn btn-default w-100 mt-3">Incluir produto</button>

    </form>

</div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>
    $(document).ready(function(){
        $('.money').mask('000.000.000.000.000,00', {reverse: true});

        $(".money").change(function(){
            $("#value").html($(this).val().replace(/\D/g,''))
        })

    });
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>