<?php
session_start();
require_once('core.php');

$carsID = $_POST['carsID'];

$shoppingCart = model::load('shoppingCart');

if($carsID){
    $shoppingCart->del($carsID);
}
