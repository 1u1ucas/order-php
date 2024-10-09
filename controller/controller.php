<?php


class IndexController {

	public function index() {
		require_once('./view/home.php');
	}

    public function orderCreated() {
        require_once('./view/order-created.php');
    }

    public function orderError() {
        require_once('./view/order-error.php');
    }

    public function orderSummary() {
        require_once('./view/order-summary.php');
    }

    public function shippingAdress() {
        require_once('./view/shippingAdress.php');
    }

    public function shippingMethod() {
        require_once('./view/shippingMethod.php');
    }

    public function shippingPayment() {
        require_once('./view/shippingPayment.php');
    }

    public function createOrder() {
        require_once('./controller/create-order.php');
    }

    public function orderSummary() {
        require_once('./view/order-summary.php');
    }

    
}