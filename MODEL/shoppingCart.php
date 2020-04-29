<?php


class shoppingCart
{
    public function __construct()
    {
        if(!isset($_SESSION['panier']) && !isset($_SESSION['price'])){
            $_SESSION['panier'] = array();
            $_SESSION['price'] = array();
        }
    }
}