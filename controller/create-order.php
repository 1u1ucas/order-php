<?php
session_start();

require_once './model/entity/Order.php';
require_once './model/repository/OrderRepository.php';

try {

    $customerName = $_POST['customerName'];
    $products = $_POST['products'];

    $order = new Order($customerName, $products);

    $orderRepository = new OrderRepository();
    $orderRepository->persist($order);

    header('Location: /order-php/shippingAdress');
} catch (Exception $e) {
    $_SESSION['error_message'] = $e->getMessage();
    header('Location: /order-php/');
}
