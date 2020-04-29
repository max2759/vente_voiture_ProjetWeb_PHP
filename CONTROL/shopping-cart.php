<?php
session_start();

$titre = 'Panier';

require_once('core.php');

if (isset($_SESSION['isAdmin'])) {
    require('../VIEW/Form.php');
    require('../VIEW/header.php');
    $basket = model::load("shoppingCart");
    $orderDetails = model::load('orderDetails');
    $order = model::load('orders');
    $usersID = $_SESSION['userID'];

    $orderDetails->readDB('c.model, c.picture, od.priceUnitOrder, od.cars_ID, b.name, od.orders_ID', 'o.state = "attente" and o.users_ID ='.$usersID, 'cars c on c.cars_ID = od.cars_ID inner join brands b on b.brands_ID = c.brands_ID inner join orders o on o.orders_ID = od.orders_ID');

    $_SESSION['panier'] = $orderDetails->data;


    require('../VIEW/shopping-cart.php');
    require('../VIEW/footer.php');
} else {
    header('Location: connexion.php');
    exit();
}


