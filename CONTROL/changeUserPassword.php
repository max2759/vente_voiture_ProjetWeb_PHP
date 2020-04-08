<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$users = model::load('users');
$oldPass = htmlspecialchars($_POST['oldPass']);
$newPass = htmlspecialchars($_POST['newPass']);
$newPass2 = htmlspecialchars($_POST['newPass2']);
$pseudo = htmlspecialchars($_POST['employeePseudo']);


if(isset($oldPass) && isset($newPass) && isset($newPass2) && isset($pseudo) && !empty($oldPass) && !empty($newPass) && !empty($newPass2) && !empty($pseudo)){
    $users->readDB(null, 'pseudo="'.$pseudo.'"');
    if(count($users->data)==1 && $users->data[0]->pseudo==$pseudo){
        $passwordVerify = password_verify($oldPass,$users->data[0]->password);
        if($passwordVerify){
            if(strlen($newPass) >= 4 && strlen($newPass2) >=4){
                if($newPass == $newPass2){
                    $passHash = password_hash($newPass, PASSWORD_DEFAULT);
                    $users->updatePassword($passHash, $pseudo);
                    $_SESSION['successpwd'] = "mot de passe modifié !";
                    header('location: '.$_SERVER['PHP_SELF']);
                    exit();
                }else{
                    session_start();
                    $_SESSION['errorpwd'] = "Les mots de passe ne correspondent pas !";
                    header("Location: ../CONTROL/home.php");
                    exit();
                }
            }else{
                session_start();
                $_SESSION['errorpwd'] = "Le mot de passe doit contenir au moins 4 caractères";
                header("Location: ../CONTROL/home.php");
                exit();
            }
        }else{
            session_start();
            $_SESSION['errorpwd'] = "Le mot de passe n'est pas bon";
            header("Location: ../CONTROL/home.php");
            exit();
        }
    }
}else{
    session_start();
    $_SESSION['errorpwd'] = "Veuillez entrer l'ancien mot de passe et le nouveau";
    header("Location: ../CONTROL/home.php");
    exit();
}

