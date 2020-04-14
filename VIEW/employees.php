<?php

if($_SESSION['isUser'] === true && $_SESSION['isAdmin'] === false){
    header('Location: ../CONTROL/home.php');
    exit();
}

// Formulaire d'ajout d'utilisateur
$form = new Form("POST", "../CONTROL/addUser.php", "formAddUser", "formAddUser");

$form->setText("Nom d'utilisateur", "nompre", "pseudo", "pseudo");
$form->setText("Nom", "nom", "nom", "nom");
$form->setText("Prenom", "prénom", "prenom", "prenom");
$form->setPassword("Mot de passe", "mot&nbsp;de&nbsp;passe", "pass", "pass");
$form->setPassword("Répéter mot de passe", "mot&nbsp;de&nbsp;passe", "pass2", "pass2");
$form->modalSend("validateUser","validateUser","disabled");

// Formulaire modifier utilisateur
$updateForm = new Form("POST", "../CONTROL/updateUser.php", "formUpdateUser", "formUpdateUser");

$updateForm->setText("Nom d'utilisateur", "nompre", "pseudoEdit", "pseudoEdit");
$updateForm->setText("Nom", "nom", "nomEdit", "nomEdit");
$updateForm->setText("Prenom", "prenom", "prenomEdit", "prenomEdit");
$updateForm->setPassword("Nouveau mot de passe", "nouveau&nbsp;mot&nbsp;de&nbsp;passe", "newPassEdit", "newPassEdit");
$updateForm->setPassword("Répéter nouveau mot de passe", "répéter&nbsp;mot&nbsp;de&nbsp;passe", "newPass2Edit", "newPass2Edit");
$updateForm->setHidden("employee_id", "employee_id", "");
$updateForm ->modalSend("validateUpdate","validateUpdate","disabled");

?>

<div class="container">

    <?php
    /**
     * Message d'erreur ajout utilisateur via le back end php
     */
    if (isset($_SESSION['errors'])) {
        $msg = $_SESSION['errors'];
        echo '<div class="alert alert-danger">' . $msg . '</div>';
        unset($_SESSION['errors']);
    }
    /**
     * Message de confirmation ajout utilisateur via le back end php
     */
    if (isset($_SESSION['success'])) {
        $msg = $_SESSION['success'];
        echo '<div class="alert alert-success">' . $msg . '</div>';
        unset($_SESSION['success']);
    }
    ?>

    <!-- Search tools -->
    <div class="row search-tool">
        <!--Radio button-->
        <div class="col-sm-1">

            <div class="form-check">
                <input class="form-check-input radioEmployee" type="radio" name="radioSearch" id="allRadio" value="option1" checked>
                <label class="form-check-label">
                    Tous
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input radioEmployee" type="radio" name="radioSearch" id="actifRadio" value="option2">
                <label class="form-check-label">
                    Actif
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input radioEmployee" type="radio" name="radioSearch" id="inactifRadio" value="option3">
                <label class="form-check-label">
                    Inactif
                </label>
            </div>
        </div>
        <!-- search engine -->
        <div class="col-md">
        <input type="search" name="searchEmpl" id="searchEmpl" placeholder="Rechercher un employé..." class="form-control col-4">
        </div>
        <!-- Button trigger modal -->
        <div class="add-box">
        <button type="button" class="btn btn-info col-auto" data-backdrop="static" data-toggle="modal" data-target="#modalAddUser">
            Ajouter
        </button>
        </div>
    </div>

    <!--Table qui contient les utilisateurs -->
    <table class="table table-hover">

        <th scope="col">Statut</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Pseudo</th>
        <th scope="col">Rôle</th>
        <th scope="col">Modifier</th>
        <th scope="col">Action</th>

        <tbody id="results">

        <?php
        $users->displayLoopResult($users);
        ?>
        </tbody>
    </table>

    <!-- Modal addUser -->
    <div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $form->getForm();
                    ?>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal updateUser -->
    <div class="modal fade" id="modalUpdateUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modifier un utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $updateForm->getForm();
                    ?>
                </div>

            </div>
        </div>
    </div>



</div>

