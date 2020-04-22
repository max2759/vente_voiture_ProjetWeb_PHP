<?php


class shoppingCart
{
    public function __construct()
    {
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
    }

    public function add($carsID){

        // teste si au moins ce produit est déjà ajouté au panier, on l'incrémente sinon on l'initialise en mettant 1
        if(isset($_SESSION['panier'][$carsID])){
            $_SESSION['panier'][$carsID]++;
        }else{
            $_SESSION['panier'][$carsID] = 1;
        }
    }

    public function del($carsID){
        unset($_SESSION['panier'][$carsID]);
    }

    public function total($cars){
        $total = 0;
        $productsID = array_keys($_SESSION['panier']);
        // Permet d'éviter l'erreur sql lorsqu'il n'y a plus de produit dans le panier
        if(empty($productsID)){
            $products = array();
        }else{
            $products = $cars->query('SELECT c.cars_ID, c.unitprice from cars c where c.cars_ID IN ('.implode(',',$productsID).')');
        }
        foreach($products as $product){
            $total += $product->unitprice;
        }

        return $total;
    }
}