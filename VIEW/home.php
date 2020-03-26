<?php

if (!(isset($_SESSION['isUser']) || isset($_SESSION['isAdmin']))) {
    header('Location: ../CONTROL/connexion.php');
    exit();
}


