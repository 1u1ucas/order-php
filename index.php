<?php

class Order {

    public static $CART_STATUS = "CART";
	public static $SHIPPING_ADDRESS_SET_STATUS = "SHIPPING_ADDRESS_SET";
	public static $SHIPPING_METHOD_SET_STATUS = "SHIPPING_METHOD_SET";
	public static $PAID_STATUS = "PAID";
	public static $MAX_PRODUCTS_BY_ORDER = 5;
	public static $BLACKLISTED_CUSTOMERS = ['David Robert'];
	public static $UNIQUE_PRODUCT_PRICE = 5;
	public static $AUTORIZED_SHIPPING_COUNTRIES = ['France', 'Belgique', 'Luxembourg'];
	public static $AVAILABLE_SHIPPING_METHODS = ['Chronopost Express', 'Point relais', 'Domicile'];
	public static $PAID_SHIPPING_METHOD = 'Chronopost Express';

	public static $PAID_SHIPPING_METHODS_COST = 5;
    
    private int $id;

    private array $products;

    private DateTime $createdAt;

    private float $totalPrice;

    private string $status;

    private ?string $shippingMethod;

    private ?string $shippingAddress;

    private string $customerName;


    public function __construct($customerName, $products,) {
        $this->status = 'CART';
        $this->customerName = $customerName;
        $this->products = $products;
        $this->createdAt = new DateTime();
        $this->totalPrice = 5*count($products);
        $this->id = rand();

        if ($this->customerName === Order::$BLACKLISTED_CUSTOMERS){
            throw new Exception ( Order::$BLACKLISTED_CUSTOMERS .' n\'a pas le droit de commander');
        }

        if (count($products) > Order::$MAX_PRODUCTS_BY_ORDER) {
			throw new Exception("Vous ne pouvez pas commander plus de " . Order::$MAX_PRODUCTS_BY_ORDER . " produits");
		}

        echo "Commande {$this->id} passée !";
    }

    private function calculateTotalCartPrice() {
        $this->totalPrice = Order::$UNIQUE_PRODUCT_PRICE * count($this->products);

        return $this->totalPrice;
    }

    private function calculateTotalCart() {
       return count($this->products);
    }

    private function removeProduct($product) {
        ($key = array_search($product, $this->products)) !== false;
        return $key;
    }

    public function deleteProduct($product) {

        if ($this->status !== Order::$CART_STATUS) {
            throw new Exception('Vous ne pouvez pas supprimer de produit d\'une commande qui n\'est pas en cours');
        }

        if (!in_array($product, $this->products)) {
            throw new Exception('Vous ne pouvez pas supprimer un produit que vous n\'avez pas commandé');
        }

        $key = $this->removeProduct($product);
        unset($this->products[$key]);
    }

    public function addProduct($product) {

        if (!$this->status === Order::$CART_STATUS) {
            throw new Exception('Vous ne pouvez pas ajouter de produit à une commande ');
        }

        if (count($this->products) >= Order::$MAX_PRODUCTS_BY_ORDER) {
            throw new Exception('Vous ne pouvez pas commander plus de ' . Order::$MAX_PRODUCTS_BY_ORDER .' produits');
        }
        if (in_array($product, $this->products)) {
            throw new Exception('Vous avez déjà commandé ce produit');
        }
        $this->products[] = $product;
        $this->totalPrice += $this->calculateTotalCartPrice();

        return 'Produit ajouté';

    }

    public function adressShipping($shippingAddress) {

        if ($this->status !== Order::$CART_STATUS) {
            throw new Exception('Vous ne pouvez pas modifier une commande qui n\'est pas en cours');
        }

        if (!in_array($shippingAddress, Order::$AUTORIZED_SHIPPING_COUNTRIES)) {
            throw new Exception('Nous ne livrons pas dans ce pays');
        }

        $this->shippingAddress = $shippingAddress;
        $this->status = Order::$SHIPPING_ADDRESS_SET_STATUS;

        return 'Adresse de livraison ajoutée';

    }

    public function pay($shippingMethod) {

        if ($this->status !== Order::$SHIPPING_ADDRESS_SET_STATUS) {
            throw new Exception('Commande non conforme');
        }

        if ($this->shippingAddress === null) {
            throw new Exception('Vous devez renseigner une adresse de livraison');
        }

        if (!in_array($shippingMethod, Order::$AVAILABLE_SHIPPING_METHODS)) {
            throw new Exception('Méthode de livraison non reconnue');
        }

        if ($this->$shippingMethod === Order::$PAID_SHIPPING_METHOD) {
            $this->totalPrice += Order::$PAID_SHIPPING_METHODS_COST;
        }

        $this->shippingMethod = $shippingMethod;
        $this->status = Order::$SHIPPING_METHOD_SET_STATUS;
        return 'Méthode de livraison choisie';
    }

    public function buyOrder () {
        if ($this->status !== Order::$SHIPPING_METHOD_SET_STATUS) {
            throw new Exception('Commande non conforme');
        }

        if ($this->shippingAddress === null) {
            throw new Exception('Vous devez renseigner une adresse de livraison');
        }

        if ($this->shippingMethod === null) {
            throw new Exception('Vous devez renseigner une méthode de livraison');
        }

        $this->status = Order::$PAID_STATUS;
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