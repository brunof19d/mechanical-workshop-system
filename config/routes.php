<?php

return [

    // Login Section
    '/login'        => \App\View\Login::class,
    '/make-login'   => \App\Controller\ControllerLogin::class,
    '/logout'       => \App\View\Logout::class,

    // Templates Section
    '/dashboard'    => \App\View\Dashboard::class,

    // Client Section
    '/add-client'   => \App\View\Client\AddClientView::class,
    '/save-client'  => \App\Controller\Client\ControllerClient::class


];