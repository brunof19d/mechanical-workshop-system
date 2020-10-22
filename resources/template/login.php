<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="container bg-light login">

    <h4 class="text-center"> LOGO MECHANIC WORKSHOP </h4>

</div>

<div class="container bg-light login">

    <form method="POST" action="/make-login">

        <?php require_once __DIR__ . '/../includes/alert-message.php'; ?>

        <div class="form-group">
            <label for="inputEmail">Username:</label>
            <input type="text" class="form-control" name="username" id="inputEmail" placeholder="Your username here." required>
        </div>

        <div class="form-group">
            <label for="inputPassword">Password:</label>
            <input type="text" class="form-control" name="password" id="inputPassword" placeholder="*******" required>
        </div>

        <button type="submit" class="btn btn-default w-100">Login</button>

    </form>

</div>