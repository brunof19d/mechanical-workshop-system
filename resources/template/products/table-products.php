<?php

require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php';
require_once __DIR__ . '/../../includes/alert-message.php';

/** @var \App\View\Products\TableProducts $allCategories */
/** @var \App\View\Products\TableProducts $allProducts */

?>

<h4 class="text-center mb-5">Tabela com todos os produtos registrado do sistema</h4>

<form method="GET" action="/table-filter">
    <div class="d-flex align-items-center">
        <label for="inputCategory">Filtar por categorias:</label>
        <select class="form-control w-50 mr-3 ml-2" id="inputCategory" name="category">
            <option selected disabled>Escolha uma categoria...</option>
            <?php foreach ($allCategories as $category): ?>
                <option value="<?= $category['id_category']; ?>"><?= $category['name_category']; ?></option>
            <?php endforeach; ?>
        </select>
        <button class="btn btn-sm btn-success">Aplicar filtro</button>
    </div>

</form>

<div class="form-group mt-3">
    <input type="text" id="filter-table" class="form-control border-dark" placeholder="Digite o nome do produto">
</div>

<table class="table table-bordered table-striped table-responsive-xl border w-100">
    <thead>
    <tr>
        <th>Referência</th>
        <th>Descrição Produto</th>
        <th>Categoria</th>
        <th>Preço unitario</th>
        <th class="text-center">#</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($allProducts as $product): ?>
        <tr class="client">
            <td><?= $product['id_product']; ?></td>
            <td class="info-name"><?= $product['description']; ?></td>
            <td><?= $product['name_category']; ?></td>
            <td><b class="mr-1">R$</b><?= $product['value']; ?></td>
            <td class="text-center">
                <form method="POST" action="/remove-product?id=<?= $product['id_product']; ?>">
                    <input type="hidden" name="url" value="/table-products">
                    <input type="hidden" name="id" value="<?= $product['id_product']; ?>">
                    <button type="submit" class="btn btn-danger btn-sm">X</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script><?php require_once __DIR__ . '/../../../public/assets/js/filterProductTable.js'; ?></script>
<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
