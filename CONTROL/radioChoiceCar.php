<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$value = $_POST['value'];
$cars = model::load("cars");

if($value == 'option1'){
    $cars->readDB('b.name, c.model, c.color, c.kilometer, c.horsepower, c.unitprice, c.fuel, c.isActive', '', 'brands b on b.brands_ID = c.brands_ID');
    $cars->displayLoopResultCars($cars);
}elseif ($value == 'option2'){

    $cars->readDB('b.name, c.model, c.color, c.kilometer, c.horsepower, c.unitprice, c.fuel, c.isActive','c.isActive = 1', 'brands b on b.brands_ID = c.brands_ID');

    $cars->displayLoopResultCars($cars);
}else{

    $cars->readDB('b.name, c.model, c.color, c.kilometer, c.horsepower, c.unitprice, c.fuel, c.isActive','c.isActive = 0', 'brands b on b.brands_ID = c.brands_ID');

    $cars->displayLoopResultCars($cars);
}