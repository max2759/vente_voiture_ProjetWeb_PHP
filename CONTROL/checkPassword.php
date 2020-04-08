<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);


$users= model::load('users');
$pseudo = htmlspecialchars($_POST['pseudo']);
$oldPass = htmlspecialchars($_POST['oldPass']);

if(isset($_POST['oldPass'])){

    $users->readDB(null, 'pseudo="'.$pseudo.'"');
    if(count($users->data)==1 && $users->data[0]->pseudo==$pseudo){
        $passwordVerify = password_verify($oldPass,$users->data[0]->password);
        if($passwordVerify){
            echo 'true';
        }else{
            echo 'false';
        }
    }
}else{
    echo 'erreur';
}
