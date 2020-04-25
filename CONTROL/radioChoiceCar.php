<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$value = $_POST['value'];
$cars = model::load("cars");

if($value == 'option1'){
    $cars->readDB('b.name, c.model, c.color, c.kilometer, c.horsepower, c.unitprice, c.fuel, c.isActive, c.year, c.cars_ID, c.picture', '', 'brands b on b.brands_ID = c.brands_ID');
    if(!empty($cars->data)){
        $cars->displayCardCars($cars);
    } else{
        echo '<h1 style="margin: auto "><i class="fas fa-car-crash"></i> PAS DE RÉSULTATS</h1>';
    }

}elseif ($value == 'option2'){

    $cars->readDB('b.name, c.model, c.color, c.kilometer, c.horsepower, c.unitprice, c.fuel, c.isActive, c.year, c.cars_ID, c.picture','c.isActive = 1', 'brands b on b.brands_ID = c.brands_ID');

    if(!empty($cars->data)){
        $cars->displayCardCars($cars);
    } else{
        echo '<h1 style="margin: auto "><i class="fas fa-car-crash"></i> PAS DE RÉSULTATS</h1>';
    }

}else{

    $cars->readDB('b.name, c.model, c.color, c.kilometer, c.horsepower, c.unitprice, c.fuel, c.isActive, c.year, c.cars_ID, c.picture','c.isActive = 0', 'brands b on b.brands_ID = c.brands_ID');

    if(!empty($cars->data)){
        $cars->displayCardCars($cars);
    } else{
        echo '<h1 style="margin: auto "><i class="fas fa-car-crash"></i> PAS DE RÉSULTATS</h1>';
    }

}