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
            (id_client, id_motorcycle, client_reported, description_motorcycle, date_added)
            VALUES 
            (:id_client, :id_motorcycle, :client_reported, :description_motorcycle, :date_added)
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':id_client'                => $client->getId(),
            ':id_motorcycle'            => $motorcycle->getIdMotorcycle(),
            ':client_reported'          => $order->getClientReported(),
            ':description_motorcycle'   => $order->getDescriptionMotorcycle(),
            ':date_added'               => $date->format('Y-m-d H:i:s')
        ]);

        return $this->pdo->lastInsertId();
    }

    public function bringProductsOrderService(OrderService $order): array
    {
        $sql = "SELECT * FROM products_by_order
            INNER JOIN product ON products_by_order.id_refproduct = product.id_product
            WHERE id_os = :id_os
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute( [ ':id_os' => $order->getIdOrder() ]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function bringProductsExternal(OrderService $order): array
    {
        $sql = "SELECT * FROM products_external_by_order WHERE id_os = :id_os";
        $statement = $this->pdo->prepare($sql);
        $statement->execute( [ ':id_os' => $order->getIdOrder() ]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProductByOrder(OrderService $order, Product $product): void
    {
        $sql = "INSERT INTO products_by_order (id_os, id_refproduct, amount, value_total) 
            VALUES (:id_os, :id_refproduct, :amount, :value_total)
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':id_os'            => $order->getIdOrder(),
            ':id_refproduct'    => $product->getIdProduct(),
            ':amount'           => $product->getAmount(),
            ':value_total'      => $product->getValueTotal()
        ]);
    }

    public function createExternalProducts(OrderService $order, Product $product): void
    {
        $sql = "INSERT INTO products_external_by_order (id_os, description, amount, value_unit, value_total) 
            VALUES (:id_os, :description, :amount, :value_unit, :value_total)
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':id_os'            => $order->getIdOrder(),
            ':description'      => $product->getDescription(),
            ':amount'           => $product->getAmount(),
            ':value_unit'       => $product->getValue(),
            ':value_total'      => $product->getValueTotal()
        ]);
    }

    public function sumTotalProducts(OrderService $order)
    {
        $sql = "SELECT SUM(value_total) FROM products_by_order WHERE id_os = :id_os";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':id_os' => $order->getIdOrder()]);
        return $statement->fetch(PDO::FETCH_COLUMN);
    }

    public function sumTotalExternalProducts(OrderService $order)
    {
        $sql = "SELECT SUM(value_total) FROM products_external_by_order WHERE id_os = :id_os";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':id_os' => $order->getIdOrder()]);
        return $statement->fetch(PDO::FETCH_COLUMN);
    }

    public function removeProductsByOrder(Product $product): void
    {
        $sql = "DELETE FROM products_by_order WHERE idproducts_by_order = :idproducts_by_order";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':idproducts_by_order' => $product->getIdProduct()]);
    }

    public function removeProductsExternal(Product $product): void
    {
        $sql = "DELETE FROM products_external_by_order WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':id' => $product->getIdProduct()]);
    }
}