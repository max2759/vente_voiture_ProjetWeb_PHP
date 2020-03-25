<?php
 require_once('core.php');

 if(isset($_POST['validateConn'])){

     $pseudoLog = htmlspecialchars($_POST['pseudoLog']);
     $passLog = htmlspecialchars($_POST['passLog']);

     if(isset($pseudoLog)){
         $users= model::load('users');
         $users->readDB(null, 'pseudo="'.$pseudoLog.'"');
         if(count($users->data)==1 && $users->data[0]->pseudo==$pseudoLog){
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
                echo 'pas le bon mdp';
            }
         }else{
             echo 'Pas d\'utilisateur avec ce pseudo';
         }
     }else{
         echo 'Entrez un nom d\'utilisateur';
     }
 }