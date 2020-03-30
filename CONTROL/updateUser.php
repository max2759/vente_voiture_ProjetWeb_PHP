<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['pseudoEdit']) && isset($_POST['nomEdit']) && isset($_POST['prenomEdit']) && isset($_POST['passEdit']) && isset($_POST['employee_id'])){


    $nomEdit = htmlspecialchars($_POST['nomEdit']);
    $prenomEdit = htmlspecialchars($_POST['prenomEdit']);
    $passEdit = htmlspecialchars($_POST['passEdit']);
    $employee_id = htmlspecialchars($_POST['employee_id']);

    $passEditHash = password_hash($passEdit, PASSWORD_DEFAULT);


    $users = model::load("users");

    $passEditHash = password_hash($passEdit, PASSWORD_DEFAULT);
    $users->updateUser($prenomEdit, $nomEdit, $passEditHash, $employee_id);
    header('location: ../CONTROL/employees.php');


}else{
    echo 'Problèmes';
}

