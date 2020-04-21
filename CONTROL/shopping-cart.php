<?php
session_start();

$titre = 'Panier';

require_once('core.php');

if (isset($_SESSION['isAdmin'])) {
    require('../VIEW/Form.php');
    require('../VIEW/header.php');
    require('../VIEW/shopping-cart.php');
    $basket = model::load("shoppingCart");
    $cars = model::load("cars");
    require('../VIEW/footer.php');
} else {
    header('Location: connexion.php');
    exit();
}


