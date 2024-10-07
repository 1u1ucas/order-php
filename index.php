<?php

class Order {private int $id;

    private array $products;

    private DateTime $createdAt;

    private float $totalPrice;

    private string $status;

    private ?string $shippingMethod;

    private ?string $shippingAddress;

    private string $customerName;

    public function __construct($customerName, $products) {
        $this->customerName = $customerName;
        $this->products = $products;
        $this->id = rand();

        if ($this->customerName === 'David Robert') {
            throw new Exception('David Robert n\'a pas le droit de commander');
        }
        if (count($this->products) > 5) {
            throw new Exception('Vous ne pouvez pas commander plus de 5 produits');
        }

        echo "Commande {$this->id} passée !";
    }

    public function deleteProduct($product) {
        if (($key = array_search($product, $this->products)) !== false) {
            unset($this->products[$key]);
            return 'Produit supprimé';
        }
        return 'Produit non trouvé';
    }

}

try {
    $order = new Order('John Doe', ['product1', 'product2', 'product3']);
} catch (Exception $e) {
    echo $e->getMessage();
}

echo $order->deleteProduct('product4');