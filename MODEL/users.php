<?php


class users extends model
{
    var $table = 'users';
    var $data;

    function addUser($firstname, $name, $password,$pseudo){
        $req= $this->stmt->prepare('CALL addUser(:pFirstname, :pName, :pPassword, :pPseudo)');
        $req->bindParam(':pFirstname', $firstname, PDO::PARAM_STR, 100);
        $req->bindParam(':pName', $name, PDO::PARAM_STR, 100);
        $req->bindParam(':pPassword', $password, PDO::PARAM_STR, 255);
        $req->bindParam(':pPseudo', $pseudo, PDO::PARAM_STR, 100);
        $req->execute();
    }
}