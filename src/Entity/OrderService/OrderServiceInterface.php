<?php


namespace App\Entity\OrderService;


use App\Entity\Client\Client;
use App\Entity\Motorcycle\Motorcycle;
use App\Entity\Product\Product;

interface OrderServiceInterface
{
    public function bringAllOrder(): array;

    public function bringOrder(OrderService $oder): array;

    public function createOrder(Client $client, Motorcycle $motorcycle, OrderService $order): string;

    public function createProductByOrder(OrderService $order, Product $product): void;

    public function bringProductsOrderService(OrderService $order): array;

    public function sumTotalProducts(OrderService $order);
}