<?php


class orderDetails extends model
{
    var $table = 'orders od';
    var $data;

    // appel la procédure stocké qui permet de vendre une voiture
    function insertOrderDetails($carsID, $orderID, $unitPrice){
        $req = $this->stmt->prepare('CALL insertOrderDetails(:pCars_ID, :pOrders_ID, :pPriceUnitOrder)');
        $req->bindParam(':pCars_ID', $carsID, PDO::PARAM_INT);
        $req->bindParam(':pOrders_ID', $orderID, PDO::PARAM_INT);
        $req->bindParam(':pPriceUnitOrder', $unitPrice, PDO::PARAM_INT);
        $req->execute();
    }

}