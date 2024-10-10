<?php


class IndexController {

	public function index() {
		require_once('view/home.php');
	}

    public function orderCreated() {
        require_once('view/order-created.php');
    }

    public function orderError() {
        require_once('view/order-error.php');
    }

    public function orderSummary() {
        require_once('view/order-summary.php');
    }

    public function shippingAdress() {
        require_once('view\shippingAdress.php');
    }

    public function shippingMethod() {
        require_once('view/shippingMethod.php');
    }

    public function shippingPayment() {
        require_once('view/shippingPayment.php');
    }

    public function createOrder() {
        require_once('controller/create-entity/Order.php');
    }

    public function addShippingAdress() {
        require_once('controller/add-shipping-adress.php');
    }

    public function addShippingMethod() {
        require_once('controller/add-shipping-method.php');
    }

    public function addPaymentMethod() {
        require_once('controller/add-payment-method.php');
    }

    public function order() {
        require_once('model/entity/Order.php');
    }

    public function function(): void{
        require_once('model/function.php');
    }
    
}