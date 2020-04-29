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

    public function total($orderDetails){
        $total = 0;
        $productsID = array_keys($_SESSION['panier']);
        // Permet d'éviter l'erreur sql lorsqu'il n'y a plus de produit dans le panier
        if(empty($productsID)){
            $products = array();
        }else{
            $products = $orderDetails->query('SELECT c.cars_ID, od.priceUnitOrder from orders_details od where od.cars_ID IN ('.implode(',',$productsID).')');
        }
        foreach($products as $product){
            $total += $product->unitprice;
        }

        return $total;
    }

    public function countCart(){
        $itemCount = 0;

        if(isset($_SESSION['panier'])){
            $itemCount = count($_SESSION['panier']);
        }else{
            $itemCount = 0;
        }

        return $itemCount;
    }
}