<?php
/*error_reporting(0);

if ($_SESSION['isUser'] || $_SESSION['isAdmin']) {
    echo '<p> Bienvenue '.$_SESSION['pseudoLog'] .'</p>';

}else {
    header('Location: ../CONTROL/connexion.php');
    exit();
}*/


error_reporting(0);

if (!($_SESSION['isUser'] || $_SESSION['isAdmin'])) {
    header('Location: ../CONTROL/connexion.php');
    exit();
}


