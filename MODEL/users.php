<?php


class users extends model
{
    var $table = 'users u';
    var $data;

    function addUser($firstname, $name, $password,$pseudo){
        $req= $this->stmt->prepare('CALL addUser(:pFirstname, :pName, :pPassword, :pPseudo)');
        $req->bindParam(':pFirstname', $firstname, PDO::PARAM_STR, 100);
        $req->bindParam(':pName', $name, PDO::PARAM_STR, 100);
        $req->bindParam(':pPassword', $password, PDO::PARAM_STR, 255);
        $req->bindParam(':pPseudo', $pseudo, PDO::PARAM_STR, 100);
        $req->execute();
    }

    function updateUser($name, $firstname, $userID){
        $req = $this->stmt->prepare('CALL updateUser(:pName, :pFirstname, :pUserID)');
        $req->bindParam(':pName', $name, PDO::PARAM_STR, 255);
        $req->bindParam(':pFirstname', $firstname, PDO::PARAM_STR, 255);
        /*$req->bindParam(':pPassword', $password, PDO::PARAM_STR, 100);*/
        $req->bindParam(':pUserID', $userID,PDO::PARAM_INT);
        $req->execute();
    }

    function userActivation($isActive, $userID){
        $req = $this->stmt->prepare('CALL userActivation(:pIsActive, :pUserID)');
        $req->bindParam(':pIsActive', $isActive,PDO::PARAM_BOOL);
        $req->bindParam(':pUserID', $userID,PDO::PARAM_INT);
        $req->execute();
    }
}