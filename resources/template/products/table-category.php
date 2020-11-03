<?php

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/content.php';
require_once __DIR__ . '/../../includes/alert-message.php';

/** @var \App\View\Products\TableCategory $allCategories */
?>
<div class="bg-light form-content border p-5">

    <h4 class="text-center">Tabela com todas categorias de produtos cadastradas no sistema</h4>

    <div class="d-flex justify-content-center m-5">
        <input type="text" id="filter-table" class="form-control border-dark w-50"
               placeholder="Digite o nome do produto">

    </div>
    <div class="d-flex justify-content-center">
        <table class="table table-bordered table-striped table-sm w-50 text-center border">
            <thead>
            <tr>
                <th>Descrição Produto</th>
                <th class="text-center">#</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($allCategories as $category ): ?>
            <tr class="client">
                <td><?= $category['name_category']; ?></td>
                <td class="text-center">
                    <a href="/remove-category?id=<?= $category['id_category']; ?>" class="btn btn-danger btn-sm">X</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
