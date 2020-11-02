<?php

require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php';

/** @var \App\View\OrderService\OrderService $dataClient */
/** @var \App\View\OrderService\OrderService $dataMotorcycle */
/** @var \App\View\OrderService\OrderService $problemDescription */
/** @var \App\View\OrderService\OrderService $descriptionMotorcycle */

$date = new DateTimeImmutable();

$_SESSION['dataClient'] = $dataClient['id'];
$_SESSION['dataMotorcycle'] = $dataMotorcycle['id_motorcycle'];
$_SESSION['problemMotorcycle'] = $problemDescription;
$_SESSION['descriptionMotorcycle'] = $descriptionMotorcycle;

?>

<div class="border bg-light form-content pl-5 pr-5 pb-5">

    <div class="order-date mt-5">
        <p class="">ORDEM DE SERVIÇO </p>
        <p class="">Hora: <?= $date->format('H:i:s'); ?></p>
        <p class="">Data: <?= $date->format('d/m/Y'); ?></p>
    </div>

    <hr>

    <div class="order-client">
        <p class="mr-3"><strong
                    class="mr-2">Cliente:</strong><?= $dataClient['firstname'] . ' ' . $dataClient['lastname'] ?> </p>
        <p class="ml-3"><strong class="mr-2">CPF / CNPJ:</strong><?= $dataClient['CPF_CNPJ']; ?></p>
    </div>

    <div class="order-contact">
        <p><strong class="mr-2">Telefone:</strong><?= $dataClient['phone_one']; ?></p>
        <p><strong class="mr-2">Telefone 2:</strong><?= $dataClient['phone_two']; ?></p>
        <p><strong class="mr-2">Email:</strong><?= $dataClient['email']; ?></p>
    </div>

    <div class="order-address">
        <p>
            <strong class="mr-2">Endereço:</strong>
            <?= $dataClient['address'] . ', ' . $dataClient['number_address']; ?>
        </p>
        <p><strong class="mr-2">Complemento:</strong><?= $dataClient['comp_address']; ?></p>
        <p><strong class="mr-2">Cidade:</strong><?= $dataClient['city']; ?></p>
        <p><strong class="mr-2">UF:</strong><?= $dataClient['state']; ?></p>
        <p><strong class="mr-2">CEP:</strong><?= $dataClient['cep']; ?></p>
    </div>

    <hr>

    <div class="order-motorcycle">
        <p><strong class="mr-2">Emplacamento:</strong><?= $dataMotorcycle['license_plate']; ?></p>
        <p><strong class="mr-2">Marca:</strong><?= $dataMotorcycle['brand']; ?></p>
        <p><strong class="mr-2">Modelo:</strong><?= $dataMotorcycle['model']; ?></p>
    </div>

    <div class="order-motorcycle">
        <p><strong class="mr-2">Cilindrada:</strong><?= $dataMotorcycle['engine_capacity']; ?></p>
        <p>
            <strong class="mr-2">Ano:</strong><?= $dataMotorcycle['manufacture_year'] . ' / ' . $dataMotorcycle['model_year'] ?>
        </p>
        <p><strong class="mr-2">KM Atual:</strong><?= $dataMotorcycle['kilometer']; ?></p>
    </div>

    <hr>

    <div class="text-nowrap">
        <strong class="mr-2">Problema informado:</strong>
        <p><?= $problemDescription; ?></p>
        <strong class="mr-2">Observações do estado da moto:</strong>
        <p><?= $descriptionMotorcycle; ?></p>
    </div>

    <a href="/save-order-service" class="btn btn-success w-100">Concluir ordem de serviço</a>

</div>

