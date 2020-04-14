<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$pseudo = htmlspecialchars($_POST["pseudo"]);

$users= model::load('users');
$users->checkUser($pseudo, $users);

