<div class="container login-container">
    <div class="col-lg-5 login-jumbotron">
        <div class="jumbotron">
    <?php

    $form = new Form("POST", "../CONTROL/loginControl.php", "formNew", "formNew");

    $form->setText("Nom d'utilisateur", "pseudo", "pseudoLog", "pseudoLog");
    $form->setPassword("Mot de passe", "password", "passLog", "passLog");
    $form->submit("validateConn", "Valider", "validateConn");

    $form->getForm();

    ?>
        </div>
    </div>
</div>