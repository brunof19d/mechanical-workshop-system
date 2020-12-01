<?php

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/navbar.php';

/** @var \App\View\Products\AddProductsInOrder $idOrder */
/** @var \App\View\Products\AddProductsInOrder $allProducts */

?>

<div class="border m-3 p-5 bg-light form-content">

    <div class="d-flex justify-content-center align-items-center">
        <h4 class="text-center mr-3"> PEÇAS CADASTRADAS NO SISTEMA </h4>
        <a href="/order?id=<?=$idOrder;?>#request" class="btn btn-danger btn-sm ml-3">Voltar</a>
    </div>

    <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

    <form method="POST" action="/save-products-order">

        <input type="hidden" name="idOrder" value="<?= $idOrder; ?>">

        <div class="col-lg-12">
            <label for="select-product">Nome Produto:</label>
            <select id="select-product" name="productSystem">
                <option value="" selected disabled>Digite um produto</option>
                <?php foreach ($allProducts as $product): ?>
                    <option value="<?= $product['id_product'] ?>"><?= $product['description']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-lg-2">
            <label for="inputAmount">Quantidade:</label>
            <input type="number" class="form-control" name="amount" id="inputAmount" placeholder="Quantidade">
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

