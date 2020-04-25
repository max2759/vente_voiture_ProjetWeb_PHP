<?php

if(isset($_SESSION['isAdmin'])){
    $user = $_SESSION['pseudoLog'];
    $changePasswordForm = new Form("POST", "../CONTROL/changeUserPassword.php", "userChangePassword", "userChangePassword");
    $changePasswordForm->setText("Ancien mot de passe", "ancien&nbsp;mot&nbsp;de&nbsp;passe", "oldPass", "oldPass");
    $changePasswordForm->setPassword("Nouveau mot de passe", "nouveau&nbsp;mot&nbsp;de&nbsp;passe", "newPass", "newPass");
    $changePasswordForm->setPassword("Répéter nouveau mot de passe", "répéter&nbsp;mot&nbsp;de&nbsp;passe", "newPass2", "newPass2");
    $changePasswordForm->setHidden("employeePseudo", "employeePseudo", "$user");
    $changePasswordForm->modalSend("validateChangePassword","validateChangePassword","disabled");
}

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
    <script src="../VIEW/js/activateUser.js"></script>
    <script src="../VIEW/js/changePassword.js"></script>
    <script src="../VIEW/js/shoppingCart.js"></script>
    <link rel="stylesheet" href="../VIEW/css/bootstrap.css">
    <link rel="stylesheet" href="../VIEW/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../VIEW/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="../VIEW/css/style.css">
    <link rel="stylesheet" href="../VIEW/css/fontawesome.min.css">
    <link rel="stylesheet" href="../VIEW/css/all.css">
    <link rel="icon" href="../VIEW/img/favicon.ico" type="image/x-icon">
</head>
<body class="bg-light">
<button id="myBtn" title="Remonter"><i class="fas fa-arrow-up"></i></button>
<?php

if(isset($_SESSION['isAdmin'])) {
    echo '<nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
        </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home.php"><i class="fas fa-home"></i> Accueil <span class="sr-only">(current)</span></a>
            </li>';

    if ($_SESSION['isAdmin'] == true) {
        echo '<li class="nav-item">
                      <a class="nav-link" href="employees.php"><i class="fas fa-users"></i> Employés</a>
                      </li>';
    };

    echo '<li class="nav-item">
                <a class="nav-link" href="cars.php"><i class="fas fa-car"></i> Voitures</a>
            </li>
        </ul>
    </div>

    <div class="logoutBox"><span><i class="fas fa-user"></i> ' . $_SESSION['pseudoLog'] . '</span>
    <div class="modify-clog">';

    if(isset($_SESSION['panier'])){
       echo ' <a class="shop-color" href="shopping-cart.php"><i class="fas fa-shopping-cart"></i></a> ('.count($_SESSION['panier']).')';
    }else{
            echo '<a class="shop-color" href="shopping-cart.php"><i class="fas fa-shopping-cart"></i></a> (0)';
    }

    echo '<button type="button" class="modal-clog">
        <svg class="bi bi-gear" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 014.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 01-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 011.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 012.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 012.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 011.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 01-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 018.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 001.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 00.52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 00-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 00-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 00-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 00-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 00.52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 001.255-.52l.094-.319z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 100 4.492 2.246 2.246 0 000-4.492zM4.754 8a3.246 3.246 0 116.492 0 3.246 3.246 0 01-6.492 0z" clip-rule="evenodd"/>
        </svg>
     </button>
     </div>
        <form method="post" action="../CONTROL/Deconnexion.php">
            <button type="submit" name="Deconnexion" class="btn-logout">
                <svg class="bi bi-box-arrow-in-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8.146 11.354a.5.5 0 010-.708L10.793 8 8.146 5.354a.5.5 0 11.708-.708l3 3a.5.5 0 010 .708l-3 3a.5.5 0 01-.708 0z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9A.5.5 0 011 8z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M13.5 14.5A1.5 1.5 0 0015 13V3a1.5 1.5 0 00-1.5-1.5h-8A1.5 1.5 0 004 3v1.5a.5.5 0 001 0V3a.5.5 0 01.5-.5h8a.5.5 0 01.5.5v10a.5.5 0 01-.5.5h-8A.5.5 0 015 13v-1.5a.5.5 0 00-1 0V13a1.5 1.5 0 001.5 1.5h8z" clip-rule="evenodd"/>
                </svg>
            </button>
        </form>
    </div>';
    ?>
    
        <div class="modal fade" id="modalChangePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modifier mot de passe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $changePasswordForm->getForm();
                    ?>
                </div>

            </div>
        </div>
    </div>
<?php
echo '</nav>';

}

?>

