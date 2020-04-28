<?php
session_start();

$titre = 'Panier';

require_once('core.php');

if (isset($_SESSION['isAdmin'])) {
    require('../VIEW/Form.php');
    require('../VIEW/header.php');
    $basket = model::load("shoppingCart");
    $cars = model::load("cars");
    $orders = model::load('orders');
    $idUser =  $_SESSION['userID'];

    $productsID = array_keys($_SESSION['panier']);
    // Permet d'éviter l'erreur sql lorsqu'il n'y a plus de produit dans le panier
    if(empty($productsID)){
        $products = array();
    }else{
        $products = $cars->query('SELECT b.name, c.cars_ID, c.model, c.picture, c.unitprice from cars c inner join brands b on b.brands_ID = c.brands_ID where c.cars_ID IN ('.implode(',',$productsID).')');
    }

    require('../VIEW/shopping-cart.php');
    require('../VIEW/footer.php');
} else {
    header('Location: connexion.php');
    exit();
}


