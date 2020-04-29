<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$value = $_POST['value'];
$users = model::load("users");

// récupère value du radio et fait une requête en fonction du choix tous, actif, inactif
if ($value == 'option1') {

    $users->readDB('u.users_ID, u.name, u.firstname, u.pseudo, r.label, u.isActive, u.roles_ID', '', 'roles r on r.roles_ID = u.roles_ID');

    if(!empty($users->data)){
        foreach ($users->data as $k)
        {
            echo '<tr>';
            if($k->isActive == 1){
                echo '<td><span class="dot-success"></span></td>';
            }else{
                echo '<td><span class="dot-danger"></span></td>';
            }
            echo '<td hidden>'.$k->users_ID.'</td>';
            echo '<td>'.$k->name.'</td>';
            echo '<td>'.$k->firstname.'</td>';
            echo '<td>'.$k->pseudo.'</td>';

            if($k->roles_ID == 1){
                echo '<td>'.$k->label.'</td>';
            }else{
                echo '<td> Employé </td>';
            }

            if($k->isActive == 1){
                echo '<td><button type="button" class="btn btn-warning btn-sm update" id="user-'.$k->users_ID.'"><i class="far fa-edit"></i></button></td>';
            }else{
                echo '<td><button type="button" class="btn btn-warning btn-sm update" id="user-'.$k->users_ID.'" disabled><i class="far fa-edit"></i></button></td>';
            }
            if($k->isActive == 1){
                echo '<td><button type="button" class="btn btn-danger btn-sm" id="activation">Désactiver</button></td>';
            }else{
                echo '<td><button type="button" class="btn btn-success btn-sm" id="activation">Activer</button></td>';
            }
            echo '</tr>';
        }
    }else{
        echo '<tr><td colspan="7" style="text-align: center"><span><i class="fas fa-user-times"></i> PAS D\'UTILISATEUR</span></td></tr>';
    }


} elseif ($value == 'option2') {

    $users->readDB('u.users_ID, u.name, u.firstname, u.pseudo, r.label, u.isActive, u.roles_ID', 'u.isActive = 1', 'roles r on r.roles_ID = u.roles_ID');

    if(!empty($users->data)){
        foreach ($users->data as $k)
        {
            echo '<tr>';
            if($k->isActive == 1){
                echo '<td><span class="dot-success"></span></td>';
            }else{
                echo '<td><span class="dot-danger"></span></td>';
            }
            echo '<td hidden>'.$k->users_ID.'</td>';
            echo '<td>'.$k->name.'</td>';
            echo '<td>'.$k->firstname.'</td>';
            echo '<td>'.$k->pseudo.'</td>';

            if($k->roles_ID == 1){
                echo '<td>'.$k->label.'</td>';
            }else{
                echo '<td> Employé </td>';
            }

            if($k->isActive == 1){
                echo '<td><button type="button" class="btn btn-warning btn-sm update" id="user-'.$k->users_ID.'"><i class="far fa-edit"></i></button></td>';
            }else{
                echo '<td><button type="button" class="btn btn-warning btn-sm update" id="user-'.$k->users_ID.'" disabled><i class="far fa-edit"></i></button></td>';
            }
            if($k->isActive == 1){
                echo '<td><button type="button" class="btn btn-danger btn-sm" id="activation">Désactiver</button></td>';
            }else{
                echo '<td><button type="button" class="btn btn-success btn-sm" id="activation">Activer</button></td>';
            }
            echo '</tr>';
        }
    }else{
        echo '<tr><td colspan="7" style="text-align: center"><span><i class="fas fa-user-times"></i> PAS D\'UTILISATEUR ACTIF</span></td></tr>';
    }


} else {

    $users->readDB('u.users_ID, u.name, u.firstname, u.pseudo, r.label, u.isActive, u.roles_ID', 'u.isActive = 0', 'roles r on r.roles_ID = u.roles_ID');

    if(!empty($users->data)){
        foreach ($users->data as $k)
        {
            echo '<tr>';
            if($k->isActive == 1){
                echo '<td><span class="dot-success"></span></td>';
            }else{
                echo '<td><span class="dot-danger"></span></td>';
            }
            echo '<td hidden>'.$k->users_ID.'</td>';
            echo '<td>'.$k->name.'</td>';
            echo '<td>'.$k->firstname.'</td>';
            echo '<td>'.$k->pseudo.'</td>';

            if($k->roles_ID == 1){
                echo '<td>'.$k->label.'</td>';
            }else{
                echo '<td> Employé </td>';
            }

            if($k->isActive == 1){
                echo '<td><button type="button" class="btn btn-warning btn-sm update" id="user-'.$k->users_ID.'"><i class="far fa-edit"></i></button></td>';
            }else{
                echo '<td><button type="button" class="btn btn-warning btn-sm update" id="user-'.$k->users_ID.'" disabled><i class="far fa-edit"></i></button></td>';
            }
            if($k->isActive == 1){
                echo '<td><button type="button" class="btn btn-danger btn-sm" id="activation">Désactiver</button></td>';
            }else{
                echo '<td><button type="button" class="btn btn-success btn-sm" id="activation">Activer</button></td>';
            }
            echo '</tr>';
        }
    }else{
        echo '<tr><td colspan="7" style="text-align: center"><span><i class="fas fa-user-times"></i> PAS D\'UTILISATEUR INACTIF</span></td></tr>';
    }

}