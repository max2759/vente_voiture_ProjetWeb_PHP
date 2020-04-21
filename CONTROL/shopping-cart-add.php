<?php

require_once('core.php');
$cars = model::load('cars');
$basket = model::load('shoppingCart');
$carsID = $_POST['carsId'];

$products = $cars->query('SELECT cars_ID from cars where cars_ID = :cars_ID', array('cars_ID'=>$carsID));

$basket->add($products);




