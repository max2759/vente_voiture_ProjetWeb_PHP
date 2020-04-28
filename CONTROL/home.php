<?php
$titre = 'Accueil';

session_start();
require_once('core.php');

if(isset($_SESSION['isAdmin'] )){
    if ($_SESSION['isAdmin'] == true || $_SESSION['isAdmin'] == false){
        require('../VIEW/Form.php');
        require('../VIEW/header.php');
        $cars = model::load("cars");
        $cars->readDB('b.name, c.picture, c.model, c.color, c.kilometer, c.horsepower, c.unitprice, c.fuel, c.year, c.isActive, c.cars_ID, c.brands_ID','', 'brands b on b.brands_ID = c.brands_ID', 'c.cars_ID DESC');

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