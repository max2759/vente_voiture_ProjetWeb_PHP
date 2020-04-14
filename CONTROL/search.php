<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['search'])){
    $searchEmployee = $_POST['search'];
    $users = model::load("users");
    $users->readDB('u.users_ID, u.name, u.firstname, u.pseudo, r.label, u.isActive', " CONCAT(u.pseudo, ' ', u.name, ' ', u.firstname,' ', r.label) LIKE '%".$searchEmployee."%'", 'roles r on r.roles_ID = u.roles_ID');
    $users->displayLoopResult($users);
}






