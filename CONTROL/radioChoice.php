<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$value = $_POST['value'];
$users = model::load("users");

if($value == 'option1'){

    $users->readDB('u.users_ID, u.name, u.firstname, u.pseudo, r.label','', 'roles r on r.roles_ID = u.roles_ID');

    foreach ($users->data as $k)
    {
        echo '<tr>';
        echo '<td hidden>'.$k->users_ID.'</td>';
        echo '<td>'.$k->name.'</td>';
        echo '<td>'.$k->firstname.'</td>';
        echo '<td>'.$k->pseudo.'</td>';
        echo '<td>'.$k->label.'</td>';
        echo '<td><button type="button" class="btn btn-warning btn-sm update" id="'.$k->users_ID.'">Modifier</button></td>';
        echo '<td><button type="button" class="btn btn-primary btn-sm" id="testActif">Activer/desactiver</button></td>';
        echo '</tr>';
    }
}elseif ($value == 'option2'){

    $users->readDB('u.users_ID, u.name, u.firstname, u.pseudo, r.label','u.isActive = 1', 'roles r on r.roles_ID = u.roles_ID');

    foreach ($users->data as $k)
    {
        echo '<tr>';
        echo '<td hidden>'.$k->users_ID.'</td>';
        echo '<td>'.$k->name.'</td>';
        echo '<td>'.$k->firstname.'</td>';
        echo '<td>'.$k->pseudo.'</td>';
        echo '<td>'.$k->label.'</td>';
        echo '<td><button type="button" class="btn btn-warning btn-sm update" id="'.$k->users_ID.'">Modifier</button></td>';
        echo '<td><button type="button" class="btn btn-primary btn-sm" id="testActif">Activer/desactiver</button></td>';
        echo '</tr>';
    }
}else{

    $users->readDB('u.users_ID, u.name, u.firstname, u.pseudo, r.label','u.isActive = 0', 'roles r on r.roles_ID = u.roles_ID');

    foreach ($users->data as $k)
    {
        echo '<tr>';
        echo '<td hidden>'.$k->users_ID.'</td>';
        echo '<td>'.$k->name.'</td>';
        echo '<td>'.$k->firstname.'</td>';
        echo '<td>'.$k->pseudo.'</td>';
        echo '<td>'.$k->label.'</td>';
        echo '<td><button type="button" class="btn btn-warning btn-sm update" id="'.$k->users_ID.'">Modifier</button></td>';
        echo '<td><button type="button" class="btn btn-primary btn-sm" id="testActif">Activer/desactiver</button></td>';
        echo '</tr>';
    }
}