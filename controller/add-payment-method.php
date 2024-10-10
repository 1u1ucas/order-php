<?php 

require_once '../model/Order.php';
require_once '../model/repository/OrderRepository.php';


try {

    if (!isset($_SESSION['order'])) {
        throw new Exception('La commande n\'existe pas dans la session.');
    }

    $order = $_SESSION['order'];

    if (!isset($_POST['paymentMethod']) || empty(trim($_POST['paymentMethod']))) {
        throw new Exception('Le mode de paiement est requis.');
    }





    $paymentMethod = trim($_POST['paymentMethod']);

    if ($paymentMethod = 'Carte bancaire'){
        $paymentinformation = $_POST['cardNumber'];
    } elseif ($paymentMethod = 'Paypal'){
        $paymentinformation = $_POST['paypalAccount'];
    } else {
        throw new Exception('Le mode de paiement est incorrect.');
    }

    $order->setPaymentMethod($paymentMethod, $paymentinformation);

    $orderRepository = new OrderRepository();

    $orderRepository->persist($order);

    header('Location: /order-php/order-summary');

} catch (Exception $e) {

    $_SESSION['error_message'] = $e->getMessage();
    header('Location: /order-php/shippingPayment');
}