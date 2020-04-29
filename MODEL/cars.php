<?php


class cars extends model
{
    var $table = 'cars c';
    var $data;

    // Ajout d'une voiture dans la DB
    function addCar($brandsID, $model, $color, $km ,$fuel, $horsepower, $unitPrice,$year, $picture){
        $req= $this->stmt->prepare('CALL addCar(:pBrandsId,:pModel,:pColor,:pKm, :pFuel, :pHorsepower, :pUnitprice, :pYear, :pPicture)');
        $req->bindParam(":pBrandsId", $brandsID, PDO::PARAM_INT);
        $req->bindParam(":pModel", $model, PDO::PARAM_STR, 255);
        $req->bindParam(":pColor", $color, PDO::PARAM_STR, 255);
        $req->bindParam(":pKm", $km, PDO::PARAM_INT);
        $req->bindParam(":pFuel", $fuel, PDO::PARAM_STR);
        $req->bindParam(":pHorsepower", $horsepower, PDO::PARAM_INT);
        $req->bindParam(":pUnitprice", $unitPrice, PDO::PARAM_INT);
        $req->bindParam(":pYear", $year, PDO::PARAM_INT);
        $req->bindParam(":pPicture", $picture, PDO::PARAM_STR, 255);
        $req->execute();

    }

    // Passage du statut de la voiture de en vente à vendue
    function changeCarStatus($carsID){
        $req= $this->stmt->prepare('CALL changeCarStatus(:pCarsID)');
        $req->bindParam(":pCarsID", $carsID, PDO::PARAM_INT);
        $req->execute();
    }
}