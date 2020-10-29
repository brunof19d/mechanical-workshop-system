<?php

require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php';

/** @var \App\View\Client\SingleClient $client */

$address = $client['address'];
$numberAddress = $client['number_address'];
$complementAddress = $client['comp_address'];
$city = $client['city'];
$state = $client['state'];

?>

<div class="border m-3 p-5 bg-light form-content">

    <a href="/table-client" class="btn btn-rollback">Voltar</a>

    <h5 class="mb-3 text-center">Dados do cliente</h5>

    <p><strong class="mr-2">Nome:</strong><?= $client['firstname']; ?> <?= $client['lastname']; ?></p>

    <p><strong class="mr-2">CPF:</strong><?= $client['CPF_CNPJ']; ?></p>

    <p><strong class="mr-2">Telefone:</strong><?= $client['phone_one']; ?></p>

    <p><strong class="mr-2">Telefone 2:</strong><?= $client['phone_two']; ?></p>

    <p><strong class="mr-2">Email:</strong><?= $client['email']; ?></p>

    <p><strong class="mr-2">CEP:</strong><?= $client['cep']; ?></p>

    <p><strong class="mr-2">Logradouro:</strong><?= "$address, $numberAddress $complementAddress, $city, $state"; ?></p>

    <p><strong>Registro:</strong> Este cliente foi adicionado ao sistema em <u><?= $client['added']; ?></u></p>

    <a class="btn btn-default" href="/update-client?id=<?= $client['id']; ?>">Editar</a>

    <h5 class="mt-3 mb-3 text-center">Motocicletas associassadas ao cliente</h5>

    <table class="table table-bordered table-striped table-responsive-xl border w-100">
        <thead>
        <tr>
            <th>Emplacamento</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Detalhes</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>XXX-XXXX</td>
            <td>Honda</td>
            <td>CBR</td>
            <td>2015</td>
            <td>Ver mais</td>
        </tr>
        </tbody>
    </table>

</div>
