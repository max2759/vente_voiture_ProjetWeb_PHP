<?php
$titre = 'Voitures';
require_once('core.php');
require('../VIEW/Form.php');
require('../VIEW/header.php');
$cars = model::load("cars");
$cars->readDB('b.name, c.model, c.color, c.kilometer, c.horsepower, c.unitprice, c.fuel','', 'brands b on b.brands_ID = c.brands_ID');
require('../VIEW/cars.php');
require('../VIEW/footer.php');

?>