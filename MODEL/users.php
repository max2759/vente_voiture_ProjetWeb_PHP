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

    function updateUser($firstname, $name, $password, $usersID){
        $req = $this->stmt->prepare('CALL updateUser(:pFirstname, pName, pPassword, pUsersID)');
        $req->bindParam(':pFirstname', $firstname, PDO::PARAM_STR, 100);
        $req->bindParam(':pName', $name, PDO::PARAM_STR, 100);
        $req->bindParam(':pPassword', $password, PDO::PARAM_STR, 100);
        $req->bindParam(':pUsersID', $usersID,PDO::PARAM_INT);
        $req->execute();
    }
}