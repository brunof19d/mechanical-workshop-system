<?php require_once __DIR__ . '/../../includes/header.php'; ?>

<h5 class="text-center mb-3">Adicionar Categoria</h5>

<form method="POST" action="/save-category">

    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="category">Nome categoria:</label>

        <div class="col-sm-8">
            <input type="text" name="category" class="form-control" id="category" placeholder="Exemplo: SISTEMA DE FREIOS.">
        </div>

        <div class="col-sm-2">
            <button type="submit" class="btn btn-default">Adicionar</button>
        </div>
    </div>

</form>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>

