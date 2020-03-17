<?php

require_once('core.php');


    $searchEmployee = $_POST['search'];
    $users = model::load("users");
    $users->readDB(null, "pseudo LIKE '%".$searchEmployee."%'");





