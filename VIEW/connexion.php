<div class="container login-container">
    <div class="col-lg-5 login-jumbotron">
        <div class="jumbotron">

            <?php

            $form = new Form("POST", "../CONTROL/loginControl.php", "formNew", "formNew");

            $form->setText("Nom d'utilisateur", "pseudo", "pseudoLog", "pseudoLog");
            $form->setPassword("Mot de passe", "password", "passLog", "passLog");
            $form->submit("validateConn", "Valider", "validateConn");
            ?>

            <?php
            /*
             * Message d'erreur si problèmes lors du login
             *
             * */
            session_start();

            if (isset($_SESSION['errors'])) {
                $msg = $_SESSION['errors'];
                echo '<div class="alert alert-danger">' . $msg . '</div>';
                unset($_SESSION['errors']);
            }
            ?>

            <?php
            $form->getForm();

            ?>
        </div>

    </div>
</div>