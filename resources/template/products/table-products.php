<?php

require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php';
require_once __DIR__ . '/../../includes/alert-message.php';

?>

<h4 class="text-center mb-5">Tabela com todos os produtos registrado do sistema</h4>

<form method="POST" action="">
    <div class="d-flex align-items-center">
        <label for="inputCategory">Filtar por categorias:</label>
        <select class="form-control w-50 mr-3 ml-2" id="inputCategory">
            <option selected disabled>ESCOLHA UMA CATEGORIA</option>
            <option>ÓLEOS E FLUÍDOS</option>
            <option>SUSPENSÃO/AMORTECEDORES</option>
            <option>SISTEMA DE FREIOS</option>
            <option>PNEUS</option>
            <option>FILTROS</option>
        </select>
        <button class="btn btn-sm btn-success">Aplicar filtro</button>
    </div>

</form>

<div class="form-group mt-3">
    <input type="text" id="filter-table" class="form-control border-dark"
           placeholder="Digite o nome do produto">
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

    <tr class="client">
        <td>1</td>
        <td>OLEO MOTUL</td>
        <td>OLEO DE MOTOR</td>
        <td>R$ 70,00</td>
        <td class="text-center"><a href="" class="btn btn-danger btn-sm">Deletar</a></td>
    </tr>
    </tbody>
</table>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
