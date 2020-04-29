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
$orders->readDB('',"users_ID =".$usersID." and state = 'attente'");
$unitprice = $cars->data[0]->unitprice;

if(isset($carsID) && isset($usersID)){

    if(!empty($orders->data)){

        $orderID = $orders->data[0]->orders_ID;

        $orderDetails->insertOrderDetails($carsID, $orderID, $unitprice);

    }else{
        $orders->insertOrder($usersID);

        $orders->readDB('',"users_ID =".$usersID." and state = 'attente'");

        $orderID = $orders->data[0]->orders_ID;

        $orderDetails->insertOrderDetails($carsID, $orderID, $unitprice);
    }


    /*
    $products = $orderDetails->query('SELECT * FROM orders_details od INNER JOIN cars c ON c.cars_ID = od.cars_ID');*/

}















