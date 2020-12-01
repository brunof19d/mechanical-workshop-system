<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/js/bootstrap.bundle.js">
    <link rel="stylesheet" href="/assets/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <title> <?= $title ?> </title>
</head>

<body>

<?php if (isset($_SESSION['auth'])): ?>

<header class="bg-dark">
    <p class="ml-3 m-0 name-menu">Software Management</p>
    <p class="m-0"> Área administrativa </p>
    <p class="m-0"> Version: 2.0.0 </p>
    <p class="m-0"><?= date('d-m-Y' . ' - ' . 'H:i A') ?></p>
    <a class="btn btn-danger btn-sm mr-3" href="/logout">Logout</a>
</header>

<?php require __DIR__ . '/navbar.php'; ?>

<div class="border container-fluid content bg-light">

<?php endif; ?>