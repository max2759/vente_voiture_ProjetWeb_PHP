<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$orderDate = htmlspecialchars($_POST['trip-start']);
$employeeID = htmlspecialchars($_POST['carsEmployeeId']);
$prixDeVente = htmlspecialchars($_POST['prix_de_vente']);

$orders = model::load('orders');

if(isset($orderDate) && isset($employeeID) && isset($prixDeVente)){
    $orders->sellCar($orderDate,$prixDeVente,$employeeID);
    session_start();
    $_SESSION['successCar'] = "Vente effectuée";
    header("Location: ../CONTROL/cars.php");
    exit();
}else{
    session_start();
    $_SESSION['errorCar'] = "Une erreur est survenue";
    header("Location: ../CONTROL/cars.php");
    exit();
}
