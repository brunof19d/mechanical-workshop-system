<?php

require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php';

/** @var \App\View\Client\ClientPage $client */

$address = $client['address'];
$numberAddress = $client['number_address'];
$complementAddress = $client['comp_address'];
$city = $client['city'];
$state = $client['state'];
$date = new DateTimeImmutable($client['added']);
?>

<div class="border m-3 p-5 bg-light form-content">

    <a href="/table-client" class="btn btn-rollback">Voltar</a>

    <h5 class="mb-3 text-center"><u>Dados do cliente</u></h5>

    <p class="d-flex justify-content-end">
        <a href="/motorcycle-client?id=<?= $client['id'] ?>">Ver motos associadas ao cliente</a>
    </p>

    <p><strong class="mr-2">Nome:</strong><?= $client['firstname']; ?> <?= $client['lastname']; ?></p>

    <p><strong class="mr-2">CPF:</strong><?= $client['CPF_CNPJ']; ?></p>

    <p><strong class="mr-2">Telefone:</strong><?= $client['phone_one']; ?></p>

    <p><strong class="mr-2">Telefone 2:</strong><?= $client['phone_two']; ?></p>

    <p><strong class="mr-2">Email:</strong><?= $client['email']; ?></p>

    <p><strong class="mr-2">CEP:</strong><?= $client['cep']; ?></p>

    <p><strong class="mr-2">Logradouro:</strong><?= "$address, $numberAddress $complementAddress, $city, $state"; ?></p>

    <p><strong>Registro:</strong> Este cliente foi adicionado ao sistema no dia
        <u><?= $date->format('d/m/Y') . ' às ' . $date->format('H:i:s'); ?></u>
    </p>

    <a class="btn btn-default" href="/update-client?id=<?= $client['id']; ?>">Editar</a>

</div>
