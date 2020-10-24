<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

require __DIR__ . '/../config/config.php';

/* Friendly URL */
$routes = require __DIR__ . '/../config/routes.php';
$pathInfo = $_SERVER['PATH_INFO'];

/* Redirect user if $_SERVER['PATH_INFO] null. */
if ($pathInfo === null) {
    header('Location: /dashboard'); // Main Page (Check routes.php for more).
    die();
}

/* If the user tries to enter a URL that does not exist, they will be redirected to the standard error page. */
if (!array_key_exists($pathInfo, $routes)) {
    http_response_code(404);
    die();
}

/* Start SESSION */
session_start();

/* If the user tries to enter the site without authenticating he will be redirected to the login page. */
$routeLogin = stripos($pathInfo, 'login');
if ( !isset ( $_SESSION['auth'] ) && $routeLogin === false ) {
    header('Location: /login');
    die();
}

/* This part of the code is defined by the Nyholm / psr7-server package, you can see more at https://github.com/Nyholm/psr7-server */
$psr17Factory = new Psr17Factory();
$creator = new ServerRequestCreator(
    $psr17Factory,
    $psr17Factory,
    $psr17Factory,
    $psr17Factory
);
$serverRequest = $creator->fromGlobals();
/* End code Nyholm */

$classControl = $routes[$pathInfo];
$control = new $classControl();

$received = $control->handle($serverRequest);

foreach ($received->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}
echo $received->getBody();