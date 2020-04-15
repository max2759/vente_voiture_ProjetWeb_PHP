<?php


class users extends model
{
    var $table = 'users u';
    var $data;

    // affiche les résultat de la boucle des utilisateurs
    function displayLoopResult($users){
        foreach ($users->data as $k)
        {
            echo '<tr>';
            if($k->isActive == 1){
                echo '<td><span class="dot-success"></span></td>';
            }else{
                echo '<td><span class="dot-danger"></span></td>';
            }
            echo '<td hidden>'.$k->users_ID.'</td>';
            echo '<td>'.$k->name.'</td>';
            echo '<td>'.$k->firstname.'</td>';
            echo '<td>'.$k->pseudo.'</td>';
            echo '<td>'.$k->label.'</td>';
            if($k->isActive == 1){
                echo '<td><button type="button" class="btn btn-warning btn-sm update" id="user-'.$k->users_ID.'">Modifier</button></td>';
            }else{
                echo '<td><button type="button" class="btn btn-warning btn-sm update" id="user-'.$k->users_ID.'" disabled>Modifier</button></td>';
            }
            if($k->isActive == 1){
                echo '<td><button type="button" class="btn btn-danger btn-sm" id="activation">Désactiver</button></td>';
            }else{
                echo '<td><button type="button" class="btn btn-success btn-sm" id="activation">Activer</button></td>';
            }
            echo '</tr>';
        }
    }

    // vérifier que l'utilisateur existe
    function checkUser($pseudo, $users){
        if(isset($pseudo)){
            $users->readDB(null, 'pseudo="'.$_POST['pseudo'].'"');
            if(count($users->data)==1 && $users->data[0]->pseudo==$_POST['pseudo']){
                echo 'true';
            }else{
                echo 'false';
            }
        }else{
            echo 'erreur';
        }

    }

    // vérifie si l'ancien mot de passe est le bon
    function checkPassword($oldPass, $pseudo, $users){
        if(isset($oldPass)){
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
    }

    // appel la procédure stocké qui permet d'ajouter des utilisateurs
    function addUser($firstname, $name, $password, $pseudo)
    {
        $req = $this->stmt->prepare('CALL addUser(:pFirstname, :pName, :pPassword, :pPseudo)');
        $req->bindParam(':pFirstname', $firstname, PDO::PARAM_STR, 100);
        $req->bindParam(':pName', $name, PDO::PARAM_STR, 100);
        $req->bindParam(':pPassword', $password, PDO::PARAM_STR, 255);
        $req->bindParam(':pPseudo', $pseudo, PDO::PARAM_STR, 100);
        $req->execute();
    }

    // appel la procédure stocké qui permet de modifier des utilisateurs
    function updateUser($name, $firstname, $userID)
    {
        $req = $this->stmt->prepare('CALL updateUser(:pName, :pFirstname, :pUserID)');
        $req->bindParam(':pName', $name, PDO::PARAM_STR, 255);
        $req->bindParam(':pFirstname', $firstname, PDO::PARAM_STR, 255);
        $req->bindParam(':pUserID', $userID, PDO::PARAM_INT);
        $req->execute();
    }

    // appel la procédure stocké qui permet de modifier des utilisateurs et de modifier son mdp
    function updateUserAndPassword($name, $firstname,$password, $userID){
        $req = $this->stmt->prepare('CALL updateUserAndPassword(:pName, :pFirstname,:pPassword, :pUserID)');
        $req->bindParam(':pName', $name, PDO::PARAM_STR, 255);
        $req->bindParam(':pFirstname', $firstname, PDO::PARAM_STR, 255);
        $req->bindParam(':pPassword', $password, PDO::PARAM_STR, 255);
        $req->bindParam(':pUserID', $userID, PDO::PARAM_INT);
        $req->execute();
    }

    // appel la procédure stocké qui permet de modifier le statut de l'employé actif/inactif
    function userActivation($isActive, $userID)
    {
        $req = $this->stmt->prepare('CALL userActivation(:pIsActive, :pUserID)');
        $req->bindParam(':pIsActive', $isActive, PDO::PARAM_BOOL);
        $req->bindParam(':pUserID', $userID, PDO::PARAM_INT);
        $req->execute();
    }

    // appel la procédure stocké qui permet de modifier le pseudo
    function updatePassword($paswword, $pseudo)
    {
        $req = $this->stmt->prepare('CALL updatePassword(:pPassword, :pPseudo)');
        $req->bindParam(':pPassword', $paswword, PDO::PARAM_STR, 255);
        $req->bindParam(':pPseudo', $pseudo, PDO::PARAM_STR, 255);
        $req->execute();
    }
}