<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['search'])){
    $searchEmployee = $_POST['search'];
    $users = model::load("users");
    $users->readDB('u.users_ID, u.name, u.firstname, u.pseudo, r.label, u.isActive, u.roles_ID', " CONCAT(u.pseudo, ' ', u.name, ' ', u.firstname,' ', r.label) LIKE '%".$searchEmployee."%'", 'roles r on r.roles_ID = u.roles_ID');

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
    } else{
        echo '<tr><td colspan="7" style="text-align: center"><span><i class="fas fa-user-times"></i> L\'UTILISATEUR N\'EXISTE PAS</span></td></tr>';
    }

}






