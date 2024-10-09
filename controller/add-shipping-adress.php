<?php

require_once '../model/Order.php';

session_start();

try {

	$order = $_SESSION['order'];

    $ShippingCountry = $_POST['ShippingCountry'];
    $ShippingCity = $_POST['ShippingCity'];
    $ShippingAdress = $_POST['ShippingAdress'];

    $order->setShippingAdress($ShippingCountry, $ShippingCity, $ShippingAdress);

    $_SESSION['order'] = $order;
    

	header('Location: ../view/order-created.php');

} catch (Exception $e) {

	header('Location: ../view/order-error.php');
}