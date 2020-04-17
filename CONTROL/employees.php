<?php
$titre = 'Employés';

session_start();

if(isset($_SESSION['isAdmin'])){
    if($_SESSION['isAdmin'] == true){
        require_once('core.php');
        require('../VIEW/Form.php');
        require('../VIEW/header.php');
        $users = model::load('users');
        $users->readDB('u.users_ID, u.name, u.firstname, u.pseudo, r.label, u.isActive','','roles r on r.roles_ID = u.roles_ID');
        require('../VIEW/employees.php');
        require('../VIEW/footer.php');
    }else{
        header('Location: home.php');
        exit();
    }
}else{
    header('Location: connexion.php');
    exit();
}


?>