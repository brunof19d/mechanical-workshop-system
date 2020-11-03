<?php

return [

    // Login Section
    '/login'        => \App\View\Login::class,
    '/make-login'   => \App\Controller\ControllerLogin::class,
    '/logout'       => \App\View\Logout::class,

    // Templates Section
    '/dashboard'    => \App\View\Dashboard::class,

    // Client section
    '/client'           => \App\View\Client\ClientPage::class,
    '/table-client'     => \App\View\Client\TableClients::class,
    '/verify-identity'  => \App\View\Client\VerifyIdentity::class,
    '/new-client'       => \App\View\Client\FormCreateClient::class,
    '/update-client'    => \App\View\Client\FormUpdateClient::class,
    '/save-client'      => \App\Controller\Client\ControllerClient::class,


    // Motorcycle section
    '/motorcycle-client'    => \App\View\Motorcycle\ClientMotorcycle::class,
    '/new-motorcycle'       => \App\View\Motorcycle\FormCreateMotorcycle::class,
    '/update-motorcycle'    => \App\View\Motorcycle\FormUpdateMotorcycle::class,
    '/save-motorcycle'      => \App\Controller\Motorcycle\ControllerMotorcycle::class,
    '/remove-motorcycle'    => \App\Controller\Motorcycle\RemoveMotorcycle::class,

    // Order of service section
    '/new-os-step1'         => \App\View\OrderService\NewOrderStepOne::class,
    '/new-os-step2'         => \App\View\OrderService\NewOrderStepTwo::class,
    '/new-os-step3'         => \App\View\OrderService\NewOrderStepThree::class,
    '/save-order-service'   => \App\Controller\OrderService\ControllerOrderService::class,
    '/order'                => \App\View\OrderService\Order::class,
    '/table-order'          => \App\View\OrderService\TableServiceOrders::class,
    '/products-by-order'    => \App\View\Products\AddProductsInOrder::class

];