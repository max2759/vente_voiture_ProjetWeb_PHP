<?php
$titre = 'Accueil';

session_start();
require_once('core.php');

if(isset($_SESSION['isAdmin'] )){
    if ($_SESSION['isAdmin'] == true || $_SESSION['isAdmin'] == false){
        require('../VIEW/Form.php');
        require('../VIEW/header.php');
        $cars = model::load('cars');
        $orderDetails = model::load('orderDetails');
        $cars->readDB('b.name, c.picture, c.model, c.color, c.kilometer, c.horsepower, c.unitprice, c.fuel, c.year, c.isActive, c.cars_ID, c.brands_ID','', 'brands b on b.brands_ID = c.brands_ID', 'c.cars_ID DESC');

        $orderDetails->readDB('c.model,u.name, u.firstname, c.picture, od.priceUnitOrder, od.cars_ID, od.orders_ID, c.unitprice', 'o.state = "valider"', ' cars c on c.cars_ID = od.cars_ID inner join brands b on b.brands_ID = c.brands_ID inner join orders o on o.orders_ID = od.orders_ID inner join users u on u.users_ID = o.users_ID');

        require('../VIEW/home.php');
        require('../VIEW/footer.php');
    }else{
        header('Location: connexion.php');
        exit();
    }
}else{
    header('Location: connexion.php');
    exit();
}




?>