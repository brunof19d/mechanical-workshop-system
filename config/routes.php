<?php

return [

    // Login Section
    '/login'        => \App\View\Login::class,
    '/make-login'   => \App\Controller\ControllerLogin::class,
    '/logout'       => \App\View\Logout::class,

    // Templates Section
    '/dashboard'    => \App\View\Dashboard::class,

    // Order of service section
    '/new-client'   => \App\View\Client\NewClient::class,
    '/save-client'  => \App\Controller\Client\ControllerClient::class,

    // Client section
    '/single-client'    => \App\View\Client\SingleClient::class,
    '/table-client'     => \App\View\Client\TableClients::class,
    '/verify-client'    => \App\View\Client\VerifyClient::class,

    // Motorcycle section
    '/new-motorcycle' => \App\View\Motorcycle\NewMotorcycle::class

];