<?php

declare(strict_types=1);

# Store - Products - Cart - User - Client - Payment

final class Store
{
    public string $name;
    public int $cantidad_empleados;
    public string $direccion;
    public array $empleados;
    public Cart $cart;

    public function createCart(Product $product): Cart
    {
        $this->cart = new Cart();
        return $this->cart;
    }
}

$tienda = new Store();
$tienda->name = 'Rosita';

class Cart
{
    public array $products;

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function removeProduct(Product $product): void
    {
        $index = array_search($product, $this->products, true);
        if ($index !== false) {
            unset($this->products[$index]);
        }
    }
}

class Product
{


    public function __construct(
        public string $name,
        public float $price,
        public string $description,
        public int $stock,
        public bool $is_available = true,
        public string $img_url
    ) {
        $this->stock = max(0, $stock);
    }

    public function decreaseStock(int $quantity): void
    {
        if ($this->stock >= $quantity && $quantity > 0) {
            $this->stock -= $quantity;
        } else {
            $this->is_available = false;
        }
    }
}

$product = new Product('Celular', 250000.25, "Un celular muy bueno", 5, true, '');
$product->name;


class User
{
    public string $name;
    public string $lastname;
    public string $gender;
    public string $dni;
}

class Client extends User
{
    public $email;
    public $credit_card;
    public $is_discount;
    public $orders_history;
}


$cliente = new Client();
$cliente->lastname = 'Perez';

class Payment extends Wallet
{
    use Notification;
    use Validations;
    use Backups;

    public function __construct($paymentMethod)
    {
        $paymentMethod->executePayment();
    }
}

abstract class Wallet {
    public $endpoint;

}

interface IPayment
{
    public function executePayment();
}

class MercadoPago implements IPayment
{
    public function executePayment()
    {
        // Implementación de la funcionalidad de pago con MercadoPago
    }
}

class Modo implements IPayment
{
    public function ejecutarPago() {}

    public function executePayment()
    {
        // Implementación de la funcionalidad de pago con MercadoPago
        $this->ejecutarPago();
    }
}

$pagar = new Payment(new Modo());


class Stripe implements IPayment
{
    public function executePayment()
    {
        // Implementación de la funcionalidad de pago con MercadoPago
    }
}

class Payway implements IPayment
{
    public function executePayment()
    {
        // Implementación de la funcionalidad de pago con MercadoPago
    }
}



class Paypal implements IPayment 
{
    public function executePayment()
    {

    }
}

trait Notification {
    public function sendEmail(string $to, string $subject, string $body): void {
        // Implementación de la funcionalidad de envío de emails
    }
    public function sendSMS(string $to, string $message): void {
        // Implementación de la funcionalidad de envío de SMS
    }
    public function sendWsp(string $to, string $message): void {
        // Implementación de la funcionalidad de envío de SMS
    }

}

trait Validations
{
    public function validateDni(string $dni): bool {
        // Implementación de la funcionalidad de validación de DNI
        return true;
    }
    public function validateEmail(string $email): bool {
        // Implementación de la funcionalidad de validación de email
        return true;
    }
    public function validatePhone(string $phone): bool {
        // Implementación de la funcionalidad de validación de teléfono
        return true;
    }

}

trait Backups
{
    public function backupData(): void {
        // Implementación de la funcionalidad de backup de datos
    }
}






class MySqlService
{
    public function getAll($table)
    {
        $this->query("SELECT * FROM $table");
    }

    public static function query(string $query)
    {
        MySqlService::rollback();
        // Implementación de la funcionalidad de query con MySQL
    }

    public static function rollback()
    {
        // Implementación de la funcionalidad de rollback
    }

}

//$db = new MySqlService();
//$users = $db->query("SELECT * FROM users");

$users = MySqlService::query("SELECT * FROM users");


class PostgresService
{

}

class SqliteService
{

}