<?php
session_start();
$titre = 'Panier';

require_once('core.php');

if (isset($_SESSION['isAdmin'])) {
    require('../VIEW/Form.php');
    require('../VIEW/header.php');
    require('../VIEW/shopping-cart.php');
    require('../VIEW/footer.php');

} else {
    header('Location: connexion.php');
    exit();
}

$cars = model::load('cars');
$cars_ID = isset($_POST['carsId']);

// crée variable de session si n'existe pas
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

$cars->readDB('c.picture, b.name','c.cars_ID =".$cars_ID."','brands b on b.brands_ID = c.brands_ID');
$cars->displayCarstoShop($cars);


