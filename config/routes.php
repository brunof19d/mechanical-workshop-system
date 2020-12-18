<?php

use App\Controller\Client\ControllerClient;
use App\Controller\ControllerLogin;
use App\Controller\Logout;
use App\Controller\Motorcycle\ControllerMotorcycle;
use App\Controller\Motorcycle\RemoveMotorcycle;
use App\View\Client\ClientPage;
use App\View\Client\FormCreateClient;
use App\View\Client\FormUpdateClient;
use App\View\Client\TableClients;
use App\View\Dashboard;
use App\View\Login;
use App\View\Motorcycle\ClientMotorcycle;
use App\View\Motorcycle\FormCreateMotorcycle;
use App\View\Motorcycle\FormUpdateMotorcycle;
use App\View\Motorcycle\TableMotorcycles;
use App\View\Products\FormCategory;
use App\View\Products\FormProduct;
use App\View\Products\TableProducts;


return [

    // Login Section
    '/login'        => Login::class,
    '/make-login'   => ControllerLogin::class,
    '/logout'       => Logout::class,

    // Dashboard
    '/dashboard'    => Dashboard::class,

    // Client section
    '/client'           => ClientPage::class,
    '/client/add'       => FormCreateClient::class,
    '/client/update'    => FormUpdateClient::class,
    '/client/table'     => TableClients::class,
    '/save-client'      => ControllerClient::class,

    // Motorcycle section
    '/motorcycles'              => TableMotorcycles::class,
    '/client/motorcycle'        => ClientMotorcycle::class,
    '/client/motorcycle/add'    => FormCreateMotorcycle::class,
    '/client/motorcycle/update' => FormUpdateMotorcycle::class,
    '/save-motorcycle'          => ControllerMotorcycle::class,
    '/remove-motorcycle'        => RemoveMotorcycle::class,

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
    '/products'                 => TableProducts::class,
    '/products/add'             => FormProduct::class,
    '/products/category/add'    => FormCategory::class,

    '/save-product'     => \App\Controller\Product\ControllerProduct::class,
    '/remove-product'   => \App\Controller\Product\RemoveProduct::class,

    '/table-filter'     => \App\View\Products\TableFilterCategory::class,



    '/table-category'   => \App\View\Products\TableCategory::class,
    '/save-category'    => \App\Controller\Product\ControllerCategory::class,
    '/remove-category'  => \App\Controller\Product\RemoveCategory::class


];