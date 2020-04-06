<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$nomEdit = htmlspecialchars($_POST['nomEdit']);
$prenomEdit = htmlspecialchars($_POST['prenomEdit']);
$passEdit = htmlspecialchars($_POST['passEdit']);
$employee_id = htmlspecialchars($_POST['employee_id']);



$users = model::load("users");
$users->updateUser($nomEdit, $prenomEdit, $employee_id);
header('location: ../CONTROL/employees.php');

