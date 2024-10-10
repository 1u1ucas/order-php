<?php

require_once '../model/entity/Order.php';
require_once '../model/repository/OrderRepository.php';

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

    $orderRepository = new OrderRepository();
    $orderRepository->persist($order);

    header('Location: /order-php/shippingPayment');

} catch (Exception $e) {

    $_SESSION['error_message'] = $e->getMessage();
    header('Location: /order-php/shippingMethod');
}