<?php

session_start();

require_once '../model/Order.php';

try {

	$order = $_SESSION['order'];

    $ShippingCountry = $_POST['ShippingCountry'];
    $ShippingCity = $_POST['ShippingCity'];
    $ShippingAdress = $_POST['ShippingAdress'];

    $order->setShippingAdress($ShippingCountry, $ShippingCity, $ShippingAdress);

    persistOrder($order);

	require_once '../view/order-created.php';

} catch (Exception $e) {

	require_once '../view/order-error.php';
}