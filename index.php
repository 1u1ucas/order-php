<?php

class Order {
    private $customerName;
    private $products;
    private $id;

    public function __construct($customerName, $products) {
        $this->customerName = $customerName;
        $this->products = $products;
        $this->id = uniqid(); // Génère un ID unique pour chaque commande
    }

    public function createOrder() {
        if ($this->customerName === 'David Robert') {
            throw new Exception('David Robert n\'a pas le droit de commander');
        }
        if (count($this->products) > 5) {
            throw new Exception('Vous ne pouvez pas commander plus de 5 produits');
        }

        return "Commande {$this->id} passée !";
    }
}

$order = new Order('John Doe', ['product1', 'product2', 'product3']);

echo $order->createOrder();
