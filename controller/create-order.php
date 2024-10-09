<?php
session_start();

require_once '../model/Order.php';
require_once '../model/function.php';

try {

    $customerName = $_POST['customerName'];
    $products = $_POST['products'];

    $order = new Order($customerName, $products);

    persistOrder($order);

    require_once '../view/shippingAdress.php';

} catch (Exception $e) {
    $_SESSION['error_message'] = $e->getMessage();
    require_once '../view/order-error.php';
}
