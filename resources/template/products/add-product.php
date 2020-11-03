<?php

require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php';
require_once __DIR__ . '/../../includes/alert-message.php';

/** @var \App\View\Products\TableProducts $allCategories */

?>

<div class="border bg-light form-content p-5">

    <h5 class="text-center mb-5">Adicionar um produto no sistema</h5>

    <form method="POST" action="">

        <div class="d-flex align-items-center m-3">
            <label for="inputDescription">Descrição produto:</label>
            <input type="text" name="description" class="form-control w-50 ml-3" id="inputDescription" placeholder="Exemplo: ÓLEO DE MOTOR 2L">
        </div>

        <div class="d-flex align-items-center m-3">
            <label for="inputValue">Valor produto:</label>
            <input type="number" name="value" class="form-control w-25 ml-3" id="inputValue" placeholder="R$ 00,00">
        </div>

        <div class="d-flex align-items-center m-3">
            <label for="inputCategory">Categoria associada ao produto:</label>
            <select class="form-control w-50 ml-3" id="inputCategory" name="category">
                <option selected disabled>Escolha uma categoria...</option>
                <?php foreach ($allCategories as $category): ?>
                <option value="<?= $category['id_category']; ?>"><?= $category['name_category']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success m-3">Adicionar</button>

    </form>

</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
