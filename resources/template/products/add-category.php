<?php

require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php';
require_once __DIR__ . '/../../includes/alert-message.php';

?>

<div class="border bg-light form-content p-5">

    <div class="d-flex justify-content-center align-items-center mb-4">
        <h5 class="text-center mr-2">Adicionar uma categoria para produtos</h5>
        <a href="/table-category" class="btn btn-sm btn-info ml-2">Ver todas categorias</a>
    </div>

    <form method="POST" action="/save-category">

        <div class="d-flex align-items-center m-3 justify-content-center">
            <label for="inputCategory">Nome categoria:</label>
            <input type="text" name="category" class="form-control w-50 ml-3" id="inputCategory"
                   placeholder="Exemplo: SISTEMA DE FREIOS.">

            <button type="submit" class="btn btn-success m-3">Adicionar</button>
        </div>

    </form>

</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>

