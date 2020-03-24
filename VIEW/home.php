<?php


if ($_SESSION['isUser'] || $_SESSION['isAdmin']) {
    echo '<p> Bienvenue '.$_SESSION['pseudoLog'] .'</p>';
    echo '<p>Vous êtes '. $_SESSION['test'].'</p>';

}else {
    header('Location: ../CONTROL/connexion.php');
    exit();
}

