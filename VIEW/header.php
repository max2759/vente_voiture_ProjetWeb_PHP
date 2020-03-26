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
    <script src="../VIEW/js/login.js"></script>
    <script src="../VIEW/js/updateUser.js"></script>
    <link rel="stylesheet" href="../VIEW/css/bootstrap.css">
    <link rel="stylesheet" href="../VIEW/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../VIEW/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="../VIEW/css/style.css">
    <link rel="icon" href="../VIEW/img/favicon.ico" type="image/x-icon">
</head>
<body>

<?php

if(isset($_SESSION['isUser']) || isset($_SESSION['isAdmin'])){
    echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
        </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Accueil <span class="sr-only">(current)</span></a>
            </li>';

            if(isset($_SESSION['isAdmin'])){
                echo '<li class="nav-item">
                      <a class="nav-link" href="employees.php">Employés</a>
                      </li>';
            };

            echo '<li class="nav-item">
                <a class="nav-link" href="cars.php">Voitures</a>
            </li>
        </ul>
    </div>

    <div class="logoutBox"><span>'.$_SESSION['pseudoLog'].'</span>
        <form method="post" action="../CONTROL/Deconnexion.php">
            <button type="submit" name="Deconnexion" class="btn-logout">
                <svg class="bi bi-box-arrow-in-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8.146 11.354a.5.5 0 010-.708L10.793 8 8.146 5.354a.5.5 0 11.708-.708l3 3a.5.5 0 010 .708l-3 3a.5.5 0 01-.708 0z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9A.5.5 0 011 8z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M13.5 14.5A1.5 1.5 0 0015 13V3a1.5 1.5 0 00-1.5-1.5h-8A1.5 1.5 0 004 3v1.5a.5.5 0 001 0V3a.5.5 0 01.5-.5h8a.5.5 0 01.5.5v10a.5.5 0 01-.5.5h-8A.5.5 0 015 13v-1.5a.5.5 0 00-1 0V13a1.5 1.5 0 001.5 1.5h8z" clip-rule="evenodd"/>
                </svg>
            </button>
        </form>
    </div>
</nav>';
}

?>

