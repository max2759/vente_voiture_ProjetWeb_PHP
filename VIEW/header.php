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

    <div class="logoutBox">
        <form method="post" action="../CONTROL/Deconnexion.php">
            <button type="submit" name="Deconnexion" class="btn-logout">
            <svg class="bi bi-box-arrow-in-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.854 11.354a.5.5 0 000-.708L5.207 8l2.647-2.646a.5.5 0 10-.708-.708l-3 3a.5.5 0 000 .708l3 3a.5.5 0 00.708 0z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M15 8a.5.5 0 00-.5-.5h-9a.5.5 0 000 1h9A.5.5 0 0015 8z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M2.5 14.5A1.5 1.5 0 011 13V3a1.5 1.5 0 011.5-1.5h8A1.5 1.5 0 0112 3v1.5a.5.5 0 01-1 0V3a.5.5 0 00-.5-.5h-8A.5.5 0 002 3v10a.5.5 0 00.5.5h8a.5.5 0 00.5-.5v-1.5a.5.5 0 011 0V13a1.5 1.5 0 01-1.5 1.5h-8z" clip-rule="evenodd"/>
            </svg>
            </button>
        </form>
    </div>
</nav>
