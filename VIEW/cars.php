<?php

if(!(isset($_SESSION['isUser']) || isset($_SESSION['isAdmin']))){
        header('Location: ../CONTROL/connexion.php');
        exit();
    }

$formCars = new Form("POST", "../CONTROL/addCar.php", "formAddCar", "formAddCar");
$formCars->setText("Marque", "marque", "marque", "marque");
$formCars->setText("Modèle", "modèle", "modele", "modele");
$formCars->setText("Couleur", "couleur", "couleur", "couleur");
$formCars->setText("Kilomètrage", "kilomètres", "km", "km");
$formCars->setText("Chevaux", "chevaux", "cv", "cv");
$formCars->setText("Prix", "prix", "prix", "prix");
$formCars->modalSend("validateCar","validateCar","disabled");


?>
<div class="container">

    <div class="row search-tool">
        <!--Radio button-->
        <div class="col-sm-1">

            <div class="form-check">
                <input class="form-check-input radioCars" type="radio" name="radioSearch" id="allRadioCar" value="option1" checked>
                <label class="form-check-label">
                    Tous
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input radioCars" type="radio" name="radioSearch" id="actifRadioCar" value="option2">
                <label class="form-check-label">
                    Disponible
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input radioCars" type="radio" name="radioSearch" id="inactifRadioCar" value="option3">
                <label class="form-check-label">
                    Vendue
                </label>
            </div>
        </div>
        <!-- search engine -->
        <div class="col-md">
            <input type="search" name="searchCar" id="searchCar" placeholder="Rechercher un véhicule..." class="form-control col-4">
        </div>
        <!-- Button trigger modal -->
        <div class="add-box">
            <button type="button" class="btn btn-info col-auto" data-backdrop="static" data-toggle="modal" data-target="#modalAddCars">
                Ajouter
            </button>
        </div>
    </div>

    <!-- Modal addCars-->
    <div class="modal fade" id="modalAddCars" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un véhicule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $formCars->getForm();
                    ?>
                </div>

            </div>
        </div>
    </div>

    <table class="table table-hover">

        <th scope="col">Disponibilité</th>
        <th scope="col">Marque</th>
        <th scope="col">Modèle</th>
        <th scope="col">Couleur</th>
        <th scope="col">Kilométrage</th>
        <th scope="col">Chevaux</th>
        <th scope="col">Prix</th>
        <th scope="col">Carburant</th>
        <th scope="col">Action</th>


        <tbody id="results">

        <?php

        $cars->displayLoopResultCars($cars);
       /*foreach ($cars->data as $k)
       {
           echo '<tr>';
           if($k->isActive == 1){
               echo '<td><span class="dot-success"></span></td>';
           }else{
               echo '<td><span class="dot-danger"></span></td>';
           }
           echo '<td>'.$k->name.'</td>';
           echo '<td>'.$k->model.'</td>';
           echo '<td>'.$k->color.'</td>';
           echo '<td>'.$k->kilometer.'</td>';
           echo '<td>'.$k->horsepower.'</td>';
           echo '<td>'.$k->unitprice.'</td>';
           echo '<td>'.$k->fuel.'</td>';
           if($k->isActive == 1){
               echo '<td><button type="button" class="btn btn-warning btn-sm sell" id="user-'.$k->cars_ID.'">Vendre</button></td>';
           }else{
               echo '<td><button type="button" class="btn btn-warning btn-sm sell" id="user-'.$k->cars_ID.'" disabled>Vendre</button></td>';
           }
           echo '</tr>';
       }*/
        ?>
    </table>
</div>

