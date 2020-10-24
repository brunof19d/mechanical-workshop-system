<?php

return [

    // Login Section
    '/login'        => \App\View\Login::class,
    '/make-login'   => \App\Controller\ControllerLogin::class,
    '/logout'       => \App\View\Logout::class,

    // Templates Section
    '/dashboard'    => \App\View\Dashboard::class,

    // Order of service section
    '/new-order'   => \App\View\OrderService\NewOrderService::class,
    '/save-order'  => \App\Controller\OrderService\ControllerOrderService::class,

    // Client section
    '/single-client'    => \App\View\Client\SingleClient::class,
    '/table-client'     => \App\View\Client\TableClients::class,
    '/verify-client'    => \App\View\Client\VerifyClient::class

];