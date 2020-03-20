<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $titre ?></title>
    <script src="../VIEW/js/jquery-3.4.1.min.js"></script>
    <script src="../VIEW/js/bootstrap.js"></script>
    <script src="../VIEW/js/inscription.js"></script>
    <script src="../VIEW/js/searchEngine.js"></script>
    <script src="../VIEW/js/updateUser.js"></script>
    <link rel="stylesheet" href="../VIEW/css/bootstrap.css">
    <link rel="stylesheet" href="../VIEW/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../VIEW/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="../VIEW/css/style.css">
    <link rel="icon" href="../VIEW/img/favicon.ico" type="image/x-icon">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
        </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="employees.php">Employés</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cars.php">Voitures</a>
            </li>
        </ul>
    </div>
</nav>
