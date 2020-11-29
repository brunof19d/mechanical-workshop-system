<?php

require_once __DIR__ . '/../includes/header.php';

/** @var \App\View\Login $tokenCsrf */

?>

<div class="container bg-light login">
    <h4 class="text-center">LOGO MECHANIC WORKSHOP</h4>
</div>

<div class="container bg-light login">

    <form method="POST" action="/make-login">

        <?php require_once __DIR__ . '/../includes/alert-message.php'; ?>

        <div class="form-group">
            <label for="email">Username:</label>
            <input type="text" class="form-control" name="username" id="email" placeholder="Your username here" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="*******" required>
        </div>

        <input type="hidden" name="csrf_token" value="<?= $tokenCsrf; ?>">

        <button type="submit" class="btn btn-default w-100">Login</button>

    </form>

</div>