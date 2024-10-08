<?php

class Order {private int $id;

    private array $products;

    private DateTime $createdAt;

    private float $totalPrice;

    private string $status;

    private ?string $shippingMethod;

    private ?string $shippingAddress;

    private string $customerName;

    public function __construct($customerName, $products,) {
        $this->status = 'cart';
        $this->customerName = $customerName;
        $this->products = $products;
        $this->createdAt = new DateTime();
        $this->totalPrice = 5*count($products);
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

    public function addProduct($product) {

        if (!$this->status === 'cart') {
            throw new Exception('Vous ne pouvez pas ajouter de produit à une commande payée');
        }

        if (count($this->products) >= 5) {
            throw new Exception('Vous ne pouvez pas commander plus de 5 produits');
        }
        if (in_array($product, $this->products)) {
            throw new Exception('Vous avez déjà commandé ce produit');
        }
        $this->products[] = $product;
        $this->totalPrice += 5*count($this->products);

        return 'Produit ajouté';

    }

    public function adressShipping($shippingAddress) {

        if ($this->status !== 'cart') {
            throw new Exception('Vous ne pouvez pas modifier une commande payée');
        }

        if (!in_array($shippingAddress, ['France', 'Belgique', 'Luxembourg'])) {
            throw new Exception('Nous ne livrons pas dans ce pays');
        }

        $this->shippingAddress = $shippingAddress;
        return 'Adresse de livraison ajoutée';

    }

    public function pay($shippingMethod) {

        if ($this->status !== 'cart') {
            throw new Exception('Commande déjà payée');
        }

        if ($this->shippingAddress === null) {
            throw new Exception('Vous devez renseigner une adresse de livraison');
        }

        if (!in_array($shippingMethod, ['ChronoPost', 'Express', 'Domicille', 'Point-Relais'])) {
            throw new Exception('Méthode de livraison non reconnue');
        }

        if ($this->$shippingMethod === 'Express'){
            $this->totalPrice += 5;
        }

        $this->shippingMethod = $shippingMethod;
        return 'Méthode de livraison choisie';
    }

    public function buyOrder () {
        if ($this->status !== 'cart') {
            throw new Exception('Commande déjà payée');
        }

        if ($this->shippingAddress === null) {
            throw new Exception('Vous devez renseigner une adresse de livraison');
        }

        if ($this->shippingMethod === null) {
            throw new Exception('Vous devez renseigner une méthode de livraison');
        }

        $this->status = 'paid';
        return 'Commande payée';
    }

}

try {
   $order = new Order('John Doe', ['product1', 'product2', 'product3']);
} catch (Exception $e) {
    echo $e->getMessage();
}

echo '<br>';

echo $order->deleteProduct('product4');

echo '<br>';

echo $order->addProduct('product4');

echo '<br>';

try{
echo $order->addProduct('product4');
} catch (Exception $e) {
    echo $e->getMessage();
}

echo '<br>';

echo $order->adressShipping('France');

echo '<br>';

try {
   echo $order->pay('Express');
} catch (Exception $e) {
    echo $e->getMessage();
}

echo '<br>';

echo $order->buyOrder();

echo '<br>';

try {
   echo $order->pay('Express');
} catch (Exception $e) {
    echo $e->getMessage();
}

echo '<br>';