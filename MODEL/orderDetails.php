<?php


class orderDetails extends model
{
    var $table = 'orders od';
    var $data;

    // appel la procédure stocké qui permet de vendre une voiture
    function sellCar($PriceUnitOrder,$UserID){
        $req = $this->stmt->prepare('CALL sellCar(:pOrderDate, :pPriceUnitOrder, :pUserID)');
        $req->bindValue(':pOrderDate', date('Y-m-d'),PDO::PARAM_STR);
        $req->bindParam(':pPriceUnitOrder', $PriceUnitOrder, PDO::PARAM_STR, 255);
        $req->bindParam(':pUserID', $UserID, PDO::PARAM_INT);
        $req->execute();
    }

}