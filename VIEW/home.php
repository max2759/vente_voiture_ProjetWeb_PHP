<?php


if ($_SESSION['isLogged']) {
    echo '<p> Bienvenue '.$_SESSION['pseudoLog'] .'</p>';
    echo '
        <form method="post" action="../CONTROL/Deconnexion.php">
		<input type="submit" value="Se déconnecter" name="Deconnexion" >
		
		</form>';
}else {
    header('Location: ../CONTROL/connexion.php');
    exit();
}

