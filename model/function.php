<?php 

function persistOrder(Order $order) {

    $_SESSION['order'] = $order;

}