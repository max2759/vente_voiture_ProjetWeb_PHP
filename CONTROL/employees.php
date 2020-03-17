<?php
$titre = 'Employés';

require_once('core.php');
require('../VIEW/Form.php');
require('../VIEW/header.php');
$users = model::load('users');
$users->readDB();
require('../VIEW/employees.php');
require('../VIEW/footer.php');

?>