<?php require_once __DIR__ . '/../../includes/header.php';

/** @var \App\Entity\Client\Client $client */

$date = new DateTimeImmutable($client->getDate());
$address = $client->getAddress();
$person = $client->getPerson();

?>

    <h5 class="mb-3"><u>Dados do cliente</u></h5>

    <div class="d-flex justify-content-around align-items-center">
        <a class="btn btn-rollback" href="/client/table">Voltar</a>
        <a class="btn btn-update" href="/client/update?id=<?= $client->getId(); ?>">Atualizar dados</a>
        <a class="btn btn-info" href="/client/motorcycle?id=<?= $client->getId(); ?>">Ver motos associadas ao cliente</a>
    </div>

    <div class=" p-5">

        <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

        <p><strong class="itemClient">Nome:</strong><?= $person->getName(); ?></p>

        <p><strong class="itemClient">CPF:</strong><?= $person->getIdentification(); ?></p>

        <p><strong class="itemClient">Telefone:</strong><?= $person->getPhoneOne(); ?></p>

        <p><strong class="itemClient">Telefone 2:</strong><?= $person->getPhoneTwo(); ?></p>

        <p><strong class="itemClient">Email:</strong><?= $person->getEmail(); ?></p>

        <p><strong class="itemClient">CEP:</strong><?= $address->getCep(); ?></p>

        <p><strong class="itemClient">Logradouro:</strong><?= $address->getStreet() . ', ' . $address->getNumber(); ?></p>

        <p><strong class="itemClient">Complemento:</strong><?= $address->getComplement(); ?></p>

        <p>
            <strong class="itemClient">Bairro / Cidade / UF:</strong>
            <?= $address->getNeighborhood() . ', ' . $address->getCity() . ', ' . $address->getState(); ?>
        </p>

        <p>
            <strong class="itemClient">Registro:</strong> Este cliente foi adicionado ao sistema no dia
            <u><?= $date->format('d/m/Y') . ' às ' . $date->format('H:i:s'); ?></u>
        </p>

    </div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>