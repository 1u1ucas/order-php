<?php

require_once('./controller/controller.php');

// Récupère l'url actuelle et supprime le chemin de base
// c'est à dire : http://localhost:8888/esd-oop-php/public/
// donc cela ne garde que la fin de l'url

$requestUri = $_SERVER['REQUEST_URI'];
$uri = parse_url($requestUri, PHP_URL_PATH);
$endUri = str_replace('/order-php/', '', $uri);
$endUri = trim($endUri, '/');

switch ($endUri) {
    case "":
        $indexController = new IndexController();
        $indexController->index();
        break;

    case "order-created":
        $indexController = new IndexController();
        $indexController->orderCreated();
        break;
    case "order-error":
        $indexController = new IndexController();
        $indexController->orderError();
        break;
    case "order-summary":
        $indexController = new IndexController();
        $indexController->orderSummary();
        break;
    case "shippingAdress":
        $indexController = new IndexController();
        $indexController->shippingAdress();
        break;
    case "shippingMethod":
        $indexController = new IndexController();
        $indexController->shippingMethod();
        break;
    case "shippingPayment":
        $indexController = new IndexController();
        $indexController->shippingPayment();
        break;

    }