<?php require_once __DIR__ . '/../../includes/header.php';

/**
 * @var \App\View\Products\TableProducts $categories
 * @var \App\Entity\Product\CategoryProduct $category
 * @var \App\View\Products\TableProducts $products
 * @var \App\Entity\Product\Product $product
 */

?>

<h4 class="text-center mb-5">Tabela com todos os produtos registrado do sistema</h4>

<form method="GET" action="/table-filter">

    <div class="d-flex align-items-center">
        <label for="category">Filtar por categorias:</label>
        <select class="form-control w-50 mr-3 ml-2" id="category" name="category">
            <option selected disabled>Escolha uma categoria...</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category->getIdCategory(); ?>">
                    <?= $category->getNameCategory(); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button class="btn btn-default " type="submit">Aplicar filtro</button>
    </div>

</form>

<div class="form-group mt-3">
    <input type="text" id="filter-table" class="form-control border-dark" placeholder="Digite o nome do produto">
</div>

<table class="table table-bordered table-striped table-responsive-xl border w-100">
    <thead>
    <tr>
        <th>Nome Produto</th>
        <th>Categoria</th>
        <th>Preço unitario</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr class="client">
            <td><?= $product->getNameProduct(); ?></td>
            <td><?= $product->getCategory()->getNameCategory(); ?></td>
            <td><b class="mr-1">R$</b><?= $product->getValue(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
