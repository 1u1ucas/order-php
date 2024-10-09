<?php 
require_once 'parts/header.php';
require_once '../model/Order.php';

session_start();


$order = $_SESSION['order'];
?>

<main>
    <h1>Récapitulatif de la commande</h1>
    <div>
        <?php echo $order->orderSummary(); ?>
    </div>
    <a href="../view/order-created.php">Confirmer la commande</a>
</main>

<?php require_once 'parts/footer.php'; ?>