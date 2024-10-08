<?php

require_once '../model/Order.php';

try {
	$order = new Order('john Doe', ['iphone', 'macbook', 'ipad',]);

	require_once '../view/order-created.php';

} catch (Exception $e) {

	require_once '../view/order-error.php';
}
