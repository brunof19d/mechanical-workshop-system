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
    '/order'                => \App\View\OrderService\Order::class,
    '/table-order'          => \App\View\OrderService\TableServiceOrders::class,
    '/new-os-step1'         => \App\View\OrderService\NewOrderStepOne::class,
    '/new-os-step2'         => \App\View\OrderService\NewOrderStepTwo::class,
    '/new-os-step3'         => \App\View\OrderService\NewOrderStepThree::class,
    '/notes-order'          => \App\View\OrderService\UpdateNotes::class,
    '/update-note'          => \App\Controller\OrderService\ControllerNotes::class,
    '/save-order-service'   => \App\Controller\OrderService\ControllerOrderService::class,
    '/products-by-order'    => \App\View\Products\AddProductsInOrder::class,
    '/products-external'    => \App\View\Products\AddProductsExternalOrder::class,
    '/save-products-order'  => \App\Controller\OrderService\ControllerProductsByOrder::class,
    '/save-products-ext'    => \App\Controller\OrderService\ControllerExternalProduct::class,
    '/remove-product-order' => \App\Controller\OrderService\RemoveProductsByOrder::class,
    '/remove-external'      => \App\Controller\OrderService\RemoveProductsExternal::class,

    // Products section
    '/add-product'      => \App\View\Products\AddProduct::class,
    '/save-product'     => \App\Controller\Product\ControllerProduct::class,
    '/remove-product'   => \App\Controller\Product\RemoveProduct::class,
    '/table-products'   => \App\View\Products\TableProducts::class,
    '/table-filter'     => \App\View\Products\TableFilterCategory::class,

    '/add-category'     => \App\View\Products\AddCategory::class,
    '/table-category'   => \App\View\Products\TableCategory::class,
    '/save-category'    => \App\Controller\Product\ControllerCategory::class,
    '/remove-category'  => \App\Controller\Product\RemoveCategory::class


];