<?php

require_once '../model/Order.php';
require_once '../model/function.php';

session_start();

try {

    if (!isset($_SESSION['order'])) {
        throw new Exception('La commande n\'existe pas dans la session.');
    }

    $order = $_SESSION['order'];

    if (!isset($_POST['shippingMethod']) || empty(trim($_POST['shippingMethod']))) {
        throw new Exception('Le mode de livraison est requis.');
    }

    $shippingMethod = trim($_POST['shippingMethod']);

    $order->setShippingMethod($shippingMethod);

    persistOrder($order);

	require_once '../view/shippingPayment.php';

} catch (Exception $e) {

    $_SESSION['error_message'] = $e->getMessage();
	require_once '../view/order-error.php';
}