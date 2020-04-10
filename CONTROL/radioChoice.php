<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$value = $_POST['value'];
$users = model::load("users");

// récupère value du radio et fait une requête en fonction du choix tous, actif, inactif
if($value == 'option1'){

    $users->readDB('u.users_ID, u.name, u.firstname, u.pseudo, r.label, u.isActive','', 'roles r on r.roles_ID = u.roles_ID');
    $users->displayLoopResult($users);

}elseif ($value == 'option2'){

    $users->readDB('u.users_ID, u.name, u.firstname, u.pseudo, r.label, u.isActive','u.isActive = 1', 'roles r on r.roles_ID = u.roles_ID');

    $users->displayLoopResult($users);
}else{

    $users->readDB('u.users_ID, u.name, u.firstname, u.pseudo, r.label, u.isActive','u.isActive = 0', 'roles r on r.roles_ID = u.roles_ID');

    $users->displayLoopResult($users);
}