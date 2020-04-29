<?php


class orders extends model
{
    var $table = 'orders o';
    var $data;

    // crée l'order à la date d'aujourd'hui
    function insertOrder($usersID){
        $req = $this->stmt->prepare('CALL insertOrder(:pUsers_ID, :pOrderDate)');
        $req->bindParam(':pUsers_ID', $usersID, PDO::PARAM_INT );
        $req->bindValue(':pOrderDate', date('Y-m-d'),PDO::PARAM_STR);
        $req->execute();
    }

    // delete une voiture dans la table order details
    function deleteOrder($orderID){
        $req = $this->stmt->prepare('CALL deleteOrder(:pOrdersID)');
        $req->bindParam(':pOrdersID', $orderID, PDO::PARAM_INT );
        $req->execute();
    }

    // change le statut de la vente à vendue si validation du panier
    function changeOrderStatus($orderID){
        $req = $this->stmt->prepare('CALL changeOrderStatus(:pOrdersID)');
        $req->bindParam(':pOrdersID', $orderID, PDO::PARAM_INT );
        $req->execute();
    }
}