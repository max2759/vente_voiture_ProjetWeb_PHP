<?php
session_start();
require_once('core.php');

// on récupère les deux id dont on a besoin
$carsID = $_POST['carsID'];
$orderID = $_POST['orderID'];

// on appelle les deux classes dont on a besoin
$orderDetails = model::load('orderDetails');
$order = model::load('orders');


$orderDetails->readDB('od.orders_ID', 'od.orders_ID ='.$orderID);


// on vérifie que les deux id sont bien set
if(isset($carsID) && isset($orderID)){

//lorsqu'il ne reste plus qu'un item dans orders details, on le delete et par la même occasion on annule la commande
    if(count($orderDetails->data) == 1){
        $orderDetails->deleteOrderDetails($carsID,$orderID);

        $order->deleteOrder($orderID);

    }else{
        $orderDetails->deleteOrderDetails($carsID,$orderID);
    }

}
