<?php


class shoppingCart
{
    public function __construct()
    {
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
    }

    /*public function add($carsID){
        $_SESSION['panier'][$carsID];
    }*/
}