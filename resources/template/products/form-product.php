<?php require_once __DIR__ . '/../../includes/header.php';

/**
 * @var \App\View\Products\TableProducts $categories
 * @var \App\Entity\Product\CategoryProduct $category
 */

?>

<a href="/products" class="btn btn-info">Tabela Produtos</a>
<a href="/products/category/add" class="btn btn-default">Adicionar Categoria</a>

<h5 class="text-center mb-5">Adicionar Produto</h5>

<form method="POST" action="/save-product">

    <!-- Name Product -->
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="name">Nome produto:</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="name" placeholder="Exemplo: ÓLEO DE MOTOR 2L">
        </div>
    </div>

    <!-- Value Product -->
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="value">Valor:</label>
        <div class="col-sm-10">
            <input type="text" name="value" class="form-control" id="value" placeholder="R$ 00,00">
        </div>
    </div>

    <!-- Category Product -->
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="category">Categoria:</label>
        <div class="col-sm-10">
            <select class="form-control" id="category" name="category">
                <option selected disabled>Escolha uma categoria...</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->getIdCategory(); ?>"><?= $category->getNameCategory(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-default w-100">Adicionar</button>

</form>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
