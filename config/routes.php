<?php

return [

    // Login Section
    '/login'        => \App\View\Login::class,
    '/make-login'   => \App\Controller\ControllerLogin::class,
    '/logout'       => \App\View\Logout::class,

    // Templates Section
    '/dashboard'    => \App\View\Dashboard::class,

    // Client section
    '/new-client'   => \App\View\Client\NewClient::class,
    '/single-client'    => \App\View\Client\SingleClient::class,
    '/table-client'     => \App\View\Client\TableClients::class,
    '/verify-client'    => \App\View\Client\VerifyClient::class,
    '/save-client'  => \App\Controller\Client\ControllerClient::class,
    '/update-client'    => \App\View\Client\FormUpdateClient::class,

    // Motorcycle section
    '/motorcycle-client'    => \App\View\Motorcycle\MotorcycleClient::class,
    '/new-motorcycle'       => \App\View\Motorcycle\NewMotorcycle::class,
    '/save-motorcycle'      => \App\Controller\Motorcycle\ControllerMotorcycle::class,
    '/update-motorcycle'    => \App\View\Motorcycle\UpdateMotorcycle::class,
    '/remove-motorcycle'    => \App\Controller\Motorcycle\RemoveMotorcycle::class,

    // Order of service section
    '/new-order-service'            => \App\View\OrderService\NewOrderService::class,
    '/description-order-service'    => \App\View\OrderService\DescriptionOrderService::class

];