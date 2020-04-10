<?php
 require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

 if(isset($_POST['validateConn'])){

     $pseudoLog = htmlspecialchars($_POST['pseudoLog']);
     $passLog = htmlspecialchars($_POST['passLog']);

     // vérifier que les champs pseudo et mot de passe existe et sont remplis
     if(isset($pseudoLog) && isset($passLog) && !empty($pseudoLog) && !empty($passLog)){
         $users = model::load('users');
         $users->readDB(null, 'pseudo="'.$pseudoLog.'"');
         // vérifier que pseudo existe et qu'il est actif
         if(count($users->data)==1 && $users->data[0]->pseudo==$pseudoLog && $users->data[0]->isActive==1){
             // vérifier que le mot de passe est correct
            $pwdVerify = password_verify($passLog, $users->data[0]->password);
            // si le mot de passe est bon on va regarder le rôle
            if($pwdVerify){
                if($users->data[0]->roles_ID==1){
                    session_start();
                    $_SESSION['pseudoLog'] = $pseudoLog;
                    $_SESSION['isAdmin'] = true;
                    $_SESSION['isUser'] = false;
                    header('location: ../CONTROL/home.php');
                }else{
                    session_start();
                    $_SESSION['pseudoLog'] = $pseudoLog;
                    $_SESSION['isUser'] = true;
                    $_SESSION['isAdmin'] = false;
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