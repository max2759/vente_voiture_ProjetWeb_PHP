<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$brands = htmlspecialchars($_POST['brands']);
$model = htmlspecialchars($_POST['model']);
$color = htmlspecialchars($_POST['color']);
$km = htmlspecialchars($_POST['km']);
$horsepower = htmlspecialchars($_POST['cv']);
$unitPrice = htmlspecialchars($_POST['price']);
$year = htmlspecialchars($_POST['yearCar']);
$fuel = htmlspecialchars($_POST['fuel']);

if(isset($brands) && isset($model) && isset($color) && isset($km) && isset($horsepower) && isset($unitPrice) && isset($year) && isset($fuel) && !empty($brands) && !empty($model) && !empty($color) && !empty($km) && !empty($horsepower) && !empty($unitPrice) && !empty($year) && !empty($fuel) ){
    // On enregistre le nom de l'image qui vient d'être
    $upload_image = $_FILES['image']['name'];
    $folder = "../VIEW/img/";
    move_uploaded_file($_FILES['image']['tmp_name'], $folder.$_FILES['image']['name']);

    $cars=model::load('cars');

    $cars->addCar($brands,$model, $color, $km ,$fuel, $horsepower, $unitPrice,$year, $upload_image);


    $_SESSION['successCar'] = "Voiture bien ajoutée";
    header('Location: cars.php');
    exit();


}else{

    $_SESSION['errorCar'] = "La voiture n'a pas été ajoutée";
    header('Location: cars.php');
    exit();
}




