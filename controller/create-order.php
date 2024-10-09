<?php
session_start();

require_once '../model/Order.php';

try {
    if (!isset($_POST['customerName']) || empty(trim($_POST['customerName']))) {
        throw new Exception('Le nom du client est requis.');
    }

    if (!isset($_POST['products']) || !is_array($_POST['products']) || count($_POST['products']) < 1 || count($_POST['products']) > 5) {
        throw new Exception('Vous devez sélectionner entre 1 et 5 produits.');
    }

    $customerName = trim($_POST['customerName']);
    $products = $_POST['products'];

    $order = new Order($customerName, $products);

    persistOrder($order);

    require_once '../view/shippingAdress.php';

} catch (Exception $e) {
    $_SESSION['error_message'] = $e->getMessage();
    require_once '../view/order-error.php';
}
