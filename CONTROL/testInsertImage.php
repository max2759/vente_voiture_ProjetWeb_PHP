<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
$cars = model::load('cars');
$upload_image = $_FILES['image']['name'];
$folder = "../VIEW/img/";
move_uploaded_file($_FILES['image']['tmp_name'], $folder.$_FILES['image']['name']);
$cars->updateImage($upload_image, 1);


