<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);


if(isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pass']) && isset($_POST['pass2']) && !empty($_POST['pseudo']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['pass']) && !empty($_POST['pass2']) ){

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $pass = htmlspecialchars($_POST['pass']);
    $pass2 = htmlspecialchars($_POST['pass2']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $pseudoRegEx ="#^[a-z]{3}[a-z]{3}$#" ;
    $nomRegEx = "#^[A-Z]+(([',. -][A-Za-zÀ-ÿ])?[A-Za-zÀ-ÿ]*)*$#";

    if(preg_match($pseudoRegEx,$pseudo)){
        $users = model::load("users");
        $users->readDB(null,'pseudo ="'.$pseudo.'"');
        if(!(count($users->data)==1 && $users->data[0]->pseudo==$_POST['pseudo'])){
            if(preg_match($nomRegEx,$nom)){
                if(preg_match($nomRegEx,$prenom)){
                    if(strlen($pass) >=4 && strlen($pass2) >=4){
                        if($pass == $pass2){
                            $passHash = password_hash($pass, PASSWORD_DEFAULT);
                            $users->addUser($prenom, $nom, $passHash, $pseudo);
                            header('location: ../CONTROL/employees.php');
                        }else{
                            session_start();
                            $_SESSION['errors'] = "Les mots de passe ne correspondent pas";
                            header("Location: ../CONTROL/employees.php");
                            exit();
                        }
                    }else{
                        session_start();
                        $_SESSION['errors'] = "Le mot de passe doit contenir au moins 4 caractère";
                        header("Location: ../CONTROL/employees.php");
                        exit();
                    }
                }else{
                    session_start();
                    $_SESSION['errors'] = "Le prénom doit commencer par une majuscule";
                    header("Location: ../CONTROL/employees.php");
                    exit();
                }

            }else{
                session_start();
                $_SESSION['errors'] = "Le nom doit commencer par une majuscule";
                header("Location: ../CONTROL/employees.php");
                exit();
            }


        }else{
            session_start();
            $_SESSION['errors'] = "L'utilisateur existe déjà";
            header("Location: ../CONTROL/employees.php");
            exit();
        }
    }else{
        session_start();
        $_SESSION['errors'] = "Le nom d'utilisateur doit être au format nompre avec 3 lettres pour le prénom et 3 pour le nom !";
        header("Location: ../CONTROL/employees.php");
        exit();
    }
}else{
    session_start();
    $_SESSION['errors'] = "Un des champs n'est pas rempli !";
    header("Location: ../CONTROL/employees.php");
    exit();
}

