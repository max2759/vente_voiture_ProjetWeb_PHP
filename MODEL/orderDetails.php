<?php


class orderDetails extends model
{
    var $table = 'orders_details od';
    var $data;

    // appel la procédure stocké qui permet de vendre une voiture
    function insertOrderDetails($carsID, $orderID, $unitPrice){
        $req = $this->stmt->prepare('CALL insertOrderDetails(:pCars_ID, :pOrders_ID, :pPriceUnitOrder)');
        $req->bindParam(':pCars_ID', $carsID, PDO::PARAM_INT);
        $req->bindParam(':pOrders_ID', $orderID, PDO::PARAM_INT);
        $req->bindParam(':pPriceUnitOrder', $unitPrice, PDO::PARAM_INT);
        $req->execute();
    }

    function deleteOrderDetails($carsID, $orderID){
        $req = $this->stmt->prepare('CALL deleteOrderDetails(:pCarsID, :pOrderID)');
        $req->bindParam(':pCarsID', $carsID, PDO::PARAM_INT);
        $req->bindParam(':pOrderID', $orderID, PDO::PARAM_INT);
        $req->execute();
    }

    function updateOrderDetails($priceUnitOrder, $carsID, $orderID){
        $req = $this->stmt->prepare('CALL updateOrderDetails(:pPriceUnitOrder, :pCarsID, :pOrderID)');
        $req->bindParam(':pPriceUnitOrder', $priceUnitOrder, PDO::PARAM_INT);
        $req->bindParam(':pCarsID', $carsID, PDO::PARAM_INT);
        $req->bindParam(':pOrderID', $orderID, PDO::PARAM_INT);
        $req->execute();
    }

}