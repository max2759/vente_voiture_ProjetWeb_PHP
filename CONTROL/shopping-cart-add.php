<?php

session_start();
require_once('core.php');
$cars = model::load('cars');
$basket = model::load('shoppingCart');
$orders = model::load('orders');
$orderDetails = model::load('orderDetails');
$usersID = $_SESSION['userID'];
$carsID = $_POST['carsId'];
$cars->readDB('c.unitprice', 'c.cars_ID ='.$carsID.'');
$orders->readDB('o.state',"users_ID =".$usersID."");
$status = $orders->data;
$unitprice = $cars->data;

if(isset($carsID) && isset($usersID)){

    if($status = "attente"){
        $orders->readDB('orders_ID', 'users_ID ='.$usersID.'');
        $orderID = $orders->data;

        $orderDetails->insertOrderDetails($carsID, $orderID, $unitprice);
    }else{
        $orders->insertOrder($usersID);
    }







    /*$orderDetails->insertOrderDetails($carsID, $)
    if($orders->readDB('o.state', 'o.state = 1')){
        $orderID = $orders->readDB('o.orders_ID');
        $orderDetails->insertOrderDetails($carsID, $orderID, $unitPrice);
    }else{
        $orders->insertOrder($usersID);
        $orderID = $orders->readDB('o.orders_ID');
        $orderDetails->insertOrderDetails($carsID, $orderID, $unitPrice);
    }

    $products = $orderDetails->query('SELECT * FROM orders_details od INNER JOIN cars c ON c.cars_ID = od.cars_ID');*/

}















