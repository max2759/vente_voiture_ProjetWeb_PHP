<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['search'])){
    $search = htmlspecialchars($_POST['search']);
    $users= model::load('users');
    $users->readDB(null, " pseudo LIKE '%'.$users.'%'");

    foreach ($users->data as $k)
    {
        echo '<tr>';
        echo '<td>'.$k->name.'</td>';
        echo '<td>'.$k->firstname.'</td>';
        echo '<td>'.$k->pseudo.'</td>';
        echo '<td>'.$k->password.'</td>';
        echo '</tr>';
    }
}






