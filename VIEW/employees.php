<?php

if(!$_SESSION['isAdmin']){
    header('Location: ../CONTROL/connexion.php');
    exit();
}

$form = new Form("POST", "../CONTROL/addUser.php", "formAddUser", "formAddUser");

$form->setText("Nom d'utilisateur", "nompre", "pseudo", "pseudo");
$form->setText("Nom", "nom", "nom", "nom");
$form->setText("Prenom", "prenom", "prenom", "prenom");
$form->setPassword("Mot de passe", "password", "pass", "pass");
$form->setPassword("Mot de passe", "password", "pass2", "pass2");
$form->modalSend("validateUser","validateUser","true");

$updateForm = new Form("POST", "../CONTROL/updateUser.php", "formUpdateUser", "formUpdateUser");

$updateForm->setText("Nom d'utilisateur", "nompre", "pseudoEdit", "pseudoEdit");
$updateForm->setText("Nom", "nom", "nomEdit", "nomEdit");
$updateForm->setText("Prenom", "prenom", "prenomEdit", "prenomEdit");
$updateForm->setPassword("Changer mot de passe", "password", "passEdit", "passEdit");
$updateForm->setHidden("employee_id", "employee_id");
$updateForm ->modalSend("validateUpdate","validateUpdate","false");

?>

<div class="container">

    <div class="row justify-content-between">
        <!-- search engine -->
        <input type="search" name="searchEmpl" id="searchEmpl" placeholder="Rechercher un employé..." class="form-control col-4">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success col-auto" data-backdrop="static" data-toggle="modal" data-target="#modalAddUser">
            Ajouter
        </button>
    </div>


    <!-- Modal addUser-->
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

    <!-- Modal updateUser-->
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



    <table class="table table-hover">
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Pseudo</th>
        <th scope="col">Modifier</th>
        <tbody id="results">

        <?php

        foreach ($users->data as $k)
        {
            echo '<tr id="'.$k->users_ID.'">';
            echo '<td data-target="name">'.$k->name.'</td>';
            echo '<td data-target="firstname">'.$k->firstname.'</td>';
            echo '<td data-target="pseudo">'.$k->pseudo.'</td>';
            echo '<td><button type="button" class="btn btn-warning btn-sm update"  id="'.$k->users_ID.'">Modifier</button></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

