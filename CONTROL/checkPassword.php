<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);


$pseudo = htmlspecialchars($_POST['pseudo']);
$oldPass = htmlspecialchars($_POST['oldPass']);
$users= model::load('users');

$users->checkPassword($oldPass, $pseudo, $users);
