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

    <h5 class="mb-3 text-center"><u>Dados do cliente</u></h5>

    <p><strong class="mr-2">Nome:</strong><?= $client['firstname']; ?> <?= $client['lastname']; ?></p>

    <p><strong class="mr-2">CPF:</strong><?= $client['CPF_CNPJ']; ?></p>

    <p><strong class="mr-2">Telefone:</strong><?= $client['phone_one']; ?></p>

    <p><strong class="mr-2">Telefone 2:</strong><?= $client['phone_two']; ?></p>

    <p><strong class="mr-2">Email:</strong><?= $client['email']; ?></p>

    <p><strong class="mr-2">CEP:</strong><?= $client['cep']; ?></p>

    <p><strong class="mr-2">Logradouro:</strong><?= "$address, $numberAddress $complementAddress, $city, $state"; ?></p>

    <p><strong>Registro:</strong> Este cliente foi adicionado ao sistema em <u><?= $client['added']; ?></u></p>

    <a class="btn btn-default w-100" href="/update-client?id=<?= $client['id']; ?>">Editar</a>

</div>
