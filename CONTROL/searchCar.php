<?php


require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['search'])) {
    $searchCar = $_POST['search'];
    $cars = model::load("cars");
    $cars->readDB('b.name, c.model, c.color, c.kilometer, c.horsepower, c.unitprice, c.fuel, c.isActive, c.picture', " CONCAT(b.name, ' ', c.color, ' ', c.model,' ',c.fuel) LIKE '%" . $searchCar . "%'", 'brands b on b.brands_ID = c.brands_ID');
    $cars->displayCardCars($cars);

}






