<div class="container">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#modalAddUser">
        Ajouter
    </button>

    <!-- Modal -->
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

                    $form = new Form("POST", "../CONTROL/addUser.php", "formAddUser", "formAddUser");

                    $form->setText("Nom d'utilisateur", "nompre", "pseudo", "pseudo", "Le pseudo doit être au format nompre en minuscule et 3 lettres pour le nom et le prénom pas d\'espace");
                    $form->setText("Nom", "nom", "nom", "nom", "test");
                    $form->setText("Prenom", "prenom", "prenom", "prenom", "test");
                    $form->setPassword("Mot de passe", "password", "pass", "pass");
                    $form->setPassword("Mot de passe", "password", "pass2", "pass2");
                    $form->modalSend();

                    $form->getForm();
                    ?>
                </div>

            </div>
        </div>
    </div>

    <input type="search" name="searchEmpl" id="searchEmpl" placeholder="Rechercher un employé..." class="form-control">

    <div id="results"></div>

    <table class="table table-hover">
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Pseudo</th>
        <th scope="col">Mot de passe</th>


        <?php

        foreach ($users->data as $k)
        {
            echo '<tr>';
            echo '<td>'.$k->name.'</td>';
            echo '<td>'.$k->firstname.'</td>';
            echo '<td>'.$k->pseudo.'</td>';
            echo '<td>'.$k->password.'</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>

