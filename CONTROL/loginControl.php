<?php
 require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

 if(isset($_POST['validateConn'])){

     $pseudoLog = htmlspecialchars($_POST['pseudoLog']);
     $passLog = htmlspecialchars($_POST['passLog']);

     if(isset($pseudoLog) && isset($passLog) && !empty($pseudoLog) && !empty($passLog)){
         $users= model::load('users');
         $users->readDB(null, 'pseudo="'.$pseudoLog.'"');
         if(count($users->data)==1 && $users->data[0]->pseudo==$pseudoLog && $users->data[0]->isActive==1){
            $pwdVerify = password_verify($passLog, $users->data[0]->password);
            if($pwdVerify){
                if($users->data[0]->roles_ID==1){
                    session_start();
                    $_SESSION['pseudoLog'] = $pseudoLog;
                    $_SESSION['isAdmin'] = true;

                    header('location: ../CONTROL/home.php');
                }else{
                    session_start();
                    $_SESSION['pseudoLog'] = $pseudoLog;
                    $_SESSION['isUser'] = true;
                    header('location: ../CONTROL/home.php');
                }

            }else{
                session_start();
                $_SESSION['errors'] = "Mot de passe incorrect";
                header("Location: ../CONTROL/connexion.php");
                exit();
            }
         }else{
             session_start();
             $_SESSION['errors'] = "Utilisateur inexistant ou désactivé";
             header("Location: ../CONTROL/connexion.php");
             exit();
         }
     }else{
         session_start();
         $_SESSION['errors'] = "Veuillez entrer un nom d'utilisateur et un mot de passe";
         header("Location: ../CONTROL/connexion.php");
         exit();
     }
 }