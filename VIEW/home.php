<?php


if ($_SESSION['isLogged']) {
    echo '<p> Bienvenue '.$_SESSION['pseudoLog'] .'</p>';

}else {
    header('Location: ../CONTROL/connexion.php');
    exit();
}

