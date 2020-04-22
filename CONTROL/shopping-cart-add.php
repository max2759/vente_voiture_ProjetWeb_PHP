<?php

session_start();
require_once('core.php');
$cars = model::load('cars');
$basket = model::load('shoppingCart');
$carsID = $_POST['carsId'];

if(isset($carsID)){
    $products = $cars->query('SELECT b.name, c.cars_ID, c.model, c.picture, c.unitprice from cars c inner join brands b on b.brands_ID = c.brands_ID where c.cars_ID = :cars_ID', array('cars_ID'=>$carsID));

    $basket->add($products[0]->cars_ID);
}














