<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);


if(isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pass']) && isset($_POST['pass2'])){

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $pass = htmlspecialchars($_POST['pass']);
    $pass2 = htmlspecialchars($_POST['pass2']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $pseudoRegEx ="#^[a-z]{3}[a-z]{3}$#" ;

    if(preg_match($pseudoRegEx,$pseudo)){
        $users = model::load("users");
        $users->readDB(null,'pseudo ="'.$pseudo.'"');
        if(!(count($users->data)==1 && $users->data[0]->pseudo==$_POST['pseudo'])){
            if($pass == $pass2){
                $passHash = password_hash($pass, PASSWORD_DEFAULT);
                $users->addUser($prenom, $nom, $passHash, $pseudo);
                header('location: ../CONTROL/employees.php');
            }else{
                echo 'Mot de passe ne correspondent pas';
            }
        }else{
            echo 'Utilisateur existe déjà';
        }
    }else{
        echo 'format pas bon !';
    }


}

