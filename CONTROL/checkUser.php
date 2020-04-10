<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

// vérifier que l'utilisateur existe
if(isset($_POST["pseudo"])){
    $users = model::load("users");
    $users->readDB(null, 'pseudo="'.$_POST['pseudo'].'"');
    if(count($users->data)==1 && $users->data[0]->pseudo==$_POST['pseudo']){
        echo 'true';
    }else{
        echo 'false';
    }
}else{
    echo 'erreur';
}
