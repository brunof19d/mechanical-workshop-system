<?php


namespace App\Entity\OrderService;


use App\Entity\Client\Client;
use App\Entity\Motorcycle\Motorcycle;

interface OrderServiceInterface
{
    public function bringAllOrder(): array;

    public function bringOrder(OrderService $oder): array;

    public function createOrder(Client $client, Motorcycle $motorcycle, OrderService $order): string;

    public function bringProductsOrderService(OrderService $order): array;

    public function allPriceOrder(OrderService $order);
}