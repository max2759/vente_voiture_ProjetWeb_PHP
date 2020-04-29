<?php


class orders extends model
{
    var $table = 'orders o';
    var $data;

    function insertOrder($usersID){
        $req = $this->stmt->prepare('CALL insertOrder(:pUsers_ID, :pOrderDate)');
        $req->bindParam(':pUsers_ID', $usersID, PDO::PARAM_INT );
        $req->bindValue(':pOrderDate', date('Y-m-d'),PDO::PARAM_STR);
        $req->execute();
    }

    function deleteOrder($orderID){
        $req = $this->stmt->prepare('CALL deleteOrder(:pOrdersID)');
        $req->bindParam(':pOrdersID', $orderID, PDO::PARAM_INT );
        $req->execute();
    }
}