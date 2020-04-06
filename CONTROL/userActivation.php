<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$row_ID = $_POST['row_ID'];

$users = model::load("users");
$users->readDB('u.isActive', 'u.users_ID ="'.$row_ID.'"');


if($users->data[0]->isActive == 1){
    $isActive = 0;
    $users->userActivation($isActive, $row_ID);
}else{
    $isActive = 1;
    $users->userActivation($isActive, $row_ID);
}