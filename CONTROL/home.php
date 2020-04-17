<?php
$titre = 'Accueil';


session_start();

if(isset($_SESSION['isAdmin'] )){
    if ($_SESSION['isAdmin'] == true || $_SESSION['isAdmin'] == false){
        require('../VIEW/Form.php');
        require('../VIEW/header.php');
        require('../VIEW/home.php');
        require('../VIEW/footer.php');
    }else{
        header('Location: connexion.php');
        exit();
    }
}else{
    header('Location: connexion.php');
    exit();
}




?>