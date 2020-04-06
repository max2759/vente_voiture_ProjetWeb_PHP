<?php
$titre = 'Employés';

require_once('core.php');
require('../VIEW/Form.php');
require('../VIEW/header.php');
$users = model::load('users');
$users->readDB('u.users_ID, u.name, u.firstname, u.pseudo, r.label, u.isActive','','roles r on r.roles_ID = u.roles_ID');
require('../VIEW/employees.php');
require('../VIEW/footer.php');

?>