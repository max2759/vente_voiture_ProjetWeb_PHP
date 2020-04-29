<?php
session_start();
require_once('core.php');

// on récupère les deux id dont on a besoin
$carsID = $_POST['carsID'];
$orderID = $_POST['orderID'];

// on appelle les deux classes dont on a besoin
$orderDetails = model::load('orderDetails');
$order = model::load('orders');

// on fait appel à la fonction qui retourne le nombre de row en fonction d'une query passée
$countOrderDetails = $orderDetails->rowCount("SELECT orders_ID from orders_details where orders_ID ='.$orderID.'");


// on vérifie que les deux id sont bien set
if(isset($carsID) && isset($orderID)){

//lorsqu'il ne reste plus qu'un item dans orders details, on le delete et par la même occasion on annule la commande
    if($countOrderDetails == 1){
        $orderDetails->deleteOrderDetails($carsID);

        $order->deleteOrder($orderID);

    }else{
        $orderDetails->deleteOrderDetails($carsID);
    }

}
