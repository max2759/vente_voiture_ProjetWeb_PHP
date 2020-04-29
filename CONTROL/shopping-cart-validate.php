<?php

session_start();
require_once('core.php');
$orders = model::load('orders');
$orderDetails = model::load('orderDetails');
$cars = model::load('cars');

$orderID = $_POST['orderID'];
$finalPrice = $_POST['finalPriceArray'];
$carsID = $_POST['carsIDArray'];


var_dump($finalPrice);
var_dump($carsID);
var_dump(count($carsID));

for($i=0; $i<count($carsID); $i++){
    $orders->changeOrderStatus($orderID);
    $orderDetails->updateOrderDetails($finalPrice[$i],$carsID[$i],$orderID);
    $cars->changeCarStatus($carsID[$i]);
}

/*if(isset($orderID)){
    $orders->changeOrderStatus($orderID);
    $orderDetails->updateOrderDetails($finalPrice,$carsID,$orderID);
    $cars->changeCarStatus($carsID);
    unset($_SESSION['panier']);
}else{
    echo 'erreur';
}*/
