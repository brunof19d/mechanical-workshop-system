<?php


namespace App\Repository;


use App\Entity\Client\Client;
use App\Entity\Motorcycle\Motorcycle;
use App\Entity\OrderService\OrderService;
use App\Entity\OrderService\OrderServiceInterface;
use App\Entity\Product\Product;
use PDO;
use App\Database\DatabaseConnection;

class OrderServiceRepository implements OrderServiceInterface
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::createConnection();
    }

    public function bringAllOrder(): array
    {
        $sql = "SELECT * FROM order_service 
            INNER JOIN client ON order_service.id_client = client.id
            INNER JOIN motorcycle ON order_service.id_motorcycle = motorcycle.id_motorcycle
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function bringOrder(OrderService $oder): array
    {
        $sql = "SELECT * FROM order_service 
            INNER JOIN client ON order_service.id_client = client.id
            INNER JOIN motorcycle ON order_service.id_motorcycle = motorcycle.id_motorcycle
            WHERE id_order = :id_order
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':id_order' => $oder->getIdOrder()]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function createOrder(Client $client, Motorcycle $motorcycle, OrderService $order): string
    {
        $date = new \DateTimeImmutable();
        $sql = "INSERT INTO order_service 
            (id_client, id_motorcycle, problem_motorcycle, description_motorcycle, date_added)
            VALUES 
            (:id_client, :id_motorcycle, :problem_motorcycle, :description_motorcycle, :date_added)
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':id_client'                => $client->getId(),
            ':id_motorcycle'            => $motorcycle->getIdMotorcycle(),
            ':problem_motorcycle'       => $order->getProblemMotorcycle(),
            ':description_motorcycle'   => $order->getDescriptionMotorcycle(),
            ':date_added'               => $date->format('Y-m-d H:i:s')
        ]);

        return $this->pdo->lastInsertId();
    }

    public function bringProductsOrderService(OrderService $order): array
    {
        $sql = "SELECT * FROM products_by_service_order
            INNER JOIN product ON products_by_service_order.id_product = product.id
            WHERE id_order_service = :id_order_service
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute( [':id_order_service' => $order->getIdOrder() ]);
        $productDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
        $productList = [];

        foreach ($productDataList as $row) {
            $productData = new Product();
            $productData->setIdProduct($row['id_product']);
            $productData->setDescription($row['description_product']);
            $productData->setValue($row['value_unit']);
            array_push($productList, $productData);
        }
        return $productList;
    }

    public function allPriceOrder(OrderService $order)
    {
        $sql = "SELECT SUM(value_total) FROM products_by_service_order WHERE id_order_service = :id_order_service";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':id_order_service' => $order->getIdOrder() ]);
        return $statement->fetch(PDO::FETCH_COLUMN);

    }
}