<?php 

class Order {

    private int $id;

    private array $products;

    private DateTime $createdAt;

    private float $totalPrice;

    private string $status;

    private ?string $shippingMethod;

    private ?string $shippingAddress;

    private string $customerName;


    public function __construct(string $customerName, array $products) {
        $this->status = 'CART';
        $this->createdAt = new DateTime();
        $this->id = rand();

        $this->customerName = $customerName;
        $this->products = $products;

        $this->totalPrice = 5 * count($products);
        echo "Commande {$this->id} créée, d'un montant de {$this->totalPrice} !";
	}

}

$order = new Order('John Doe', ['product1', 'product2', 'product3']);