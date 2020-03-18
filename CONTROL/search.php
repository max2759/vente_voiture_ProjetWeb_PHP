<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['search'])){
    $searchEmployee = $_POST['search'];
    $users = model::load("users");
    $users->readDB(null, "pseudo LIKE '%".$searchEmployee."%'");

    foreach ($users->data as $k)
    {
        echo '<tr>';
        echo '<td>'.$k->name.'</td>';
        echo '<td>'.$k->firstname.'</td>';
        echo '<td>'.$k->pseudo.'</td>';
        echo '<td><button type="button" class="btn btn-warning btn-sm update" id="'.$k->users_ID.'">Modifier</button></td>';
        echo '</tr>';
    }



    /*if(count($users->data)){
        foreach ($users->data as $k)
        {
            echo '<tr>';
            echo '<td>'.$k->name.'</td>';
            echo '<td>'.$k->firstname.'</td>';
            echo '<td>'.$k->pseudo.'</td>';
            echo '<td><button type="button" class="btn btn-success btn-sm update" id="'.$k->users_ID.'">Modifier</button></td>';
            echo '</tr>';
        }
    }else{
        $users->readDB();
        foreach ($users->data as $k)
        {
            echo '<tr>';
            echo '<td>'.$k->name.'</td>';
            echo '<td>'.$k->firstname.'</td>';
            echo '<td>'.$k->pseudo.'</td>';
            echo '<td><button type="button" class="btn btn-success btn-sm update" id="'.$k->users_ID.'">Modifier</button></td>';
            echo '</tr>';
        }
    }*/

}






