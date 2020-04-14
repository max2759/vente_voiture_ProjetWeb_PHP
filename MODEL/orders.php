<?php


class orders extends model
{
    var $table = 'orders o';
    var $data;


    // appel la procédure stocké qui permet de vendre une voiture
    function sellCar($OrderDate,$PriceUnitOrder,$UserID){
        $req = $this->stmt->prepare('CALL sellCar(:pOrderDate, :pPriceUnitOrder, :pUserID)');
        $req->bindParam(':pOrderDate', $OrderDate, PDO::PARAM_STR, 255);
        $req->bindParam(':pPriceUnitOrder', $PriceUnitOrder, PDO::PARAM_STR, 255);
        $req->bindParam(':pUserID', $UserID, PDO::PARAM_INT);
        $req->execute();
    }
}