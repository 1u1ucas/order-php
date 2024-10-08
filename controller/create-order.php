<?php

require_once '../model/Order.php';

session_start();

try {

	$customerName = $_POST['customerName'];
	$products = $_POST['products'];

	$order = new Order($customerName, $products);

	$_SESSION['order'] = $order;

	require_once '../view/shippingAdress.php';

} catch (Exception $e) {

	require_once '../view/order-error.php';
}