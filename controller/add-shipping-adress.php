<?php
require_once './model/entity/Order.php';
require_once './model/repository/OrderRepository.php';

$orderRepository = new OrderRepository();
try {
    

    if (!isset($_SESSION['order'])) {
        throw new Exception('La commande n\'existe pas dans la session.');
    }

    $order = $_SESSION['order'];

    

    if (!isset($_POST['ShippingCountry']) || empty(trim($_POST['ShippingCountry']))) {
        throw new Exception('Le pays de livraison est requis.');
    }

    if (!isset($_POST['ShippingCity']) || empty(trim($_POST['ShippingCity']))) {
        throw new Exception('La ville de livraison est requise.');
    }

    if (!isset($_POST['ShippingAdress']) || empty(trim($_POST['ShippingAdress']))) {
        throw new Exception('L\'adresse de livraison est requise.');
    }

    $ShippingCountry = trim($_POST['ShippingCountry']);
    $ShippingCity = trim($_POST['ShippingCity']);
    $ShippingAdress = trim($_POST['ShippingAdress']);



    $order->setShippingAdress($ShippingCountry, $ShippingAdress, $ShippingCity);

   
    $orderRepository->persist($order);

    header('Location: /order-php/shippingMethod');

} catch (Exception $e) {
    
        $_SESSION['error_message'] = $e->getMessage();
        header('Location: /order-php/shippingAdress');
}
