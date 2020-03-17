<?php

require_once('core.php');


if(isset($_POST['search'])){
    $search = htmlspecialchars($_POST['search']);
    $users= model::load('users');
    $users->readDB(null, " pseudo LIKE '%'.$users.'%'");

}






