<?php

if (!(isset($_SESSION['isUser']) || isset($_SESSION['isAdmin']))) {

    header('Location: ../CONTROL/connexion.php');
    exit();
}
$userID = $_SESSION['userID'];
$formCars = new Form("POST", "../CONTROL/sellCar.php", "formAddCar", "formAddCar");
$formCars->setText("Marque", "marque", "marque", "marque");
$formCars->setText("Modèle", "modèle", "modele", "modele");
$formCars->setText("Couleur", "couleur", "couleur", "couleur");
$formCars->setText("Kilomètrage", "kilomètres", "km", "km");
$formCars->setText("Chevaux", "chevaux", "cv", "cv");
$formCars->setText("Prix", "prix", "prix", "prix");
$formCars->setText("Carburant", "carburant", "carburant", "carburant");
$formCars->setText("Année", "année", "annee", "annee");
$formCars->setNumber("Prix de vente", "prix_de_vente", "prix_de_vente");
$formCars->setHidden('carsEmployeeId', 'carsEmployeeId', $userID);
$formCars->setDate();

$formCars->modalSend("validateCar", "validateCar");


?>
<div class="container">

    <?php
    /**
     * Message d'erreur vente voiture via le back end php
     */
    if (isset($_SESSION['errorCar'])) {
        $msg = $_SESSION['errorCar'];
        echo '<div class="alert alert-danger">' . $msg . '</div>';
        unset($_SESSION['errors']);
    }

    /*
    * Message pour avertir que la vente a bien été réalisée
    */
    if(isset($_SESSION['successCar'])){
        $msg = $_SESSION['successCar'];
        echo '<div class="alert alert-success">' . $msg . '</div>';
        unset($_SESSION['successCar']);
    }

    ?>
<div class="col car-page">
    <div class="row search-tool-car">
        <!--Radio button-->
        <div>
            <div class="form-check">
                <input class="form-check-input radioCars" type="radio" name="radioSearch" id="allRadioCar"
                       value="option1" checked>
                <label class="form-check-label">
                    Tous
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input radioCars" type="radio" name="radioSearch" id="actifRadioCar"
                       value="option2">
                <label class="form-check-label">
                    Disponible
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input radioCars" type="radio" name="radioSearch" id="inactifRadioCar"
                       value="option3">
                <label class="form-check-label">
                    Vendue
                </label>
            </div>
        </div>
        <!-- search engine -->
        <div>
            <input type="search" name="searchCar" id="searchCar" placeholder="Rechercher un véhicule..."
                   class="form-control">
        </div>
        <!-- Button trigger modal -->
        <!--<div class="add-box">
            <button type="button" class="btn btn-info col-auto" data-backdrop="static" data-toggle="modal" data-target="#modalAddCars">
                Ajouter
            </button>
        </div>-->
    </div>

    <!--test List voiture-->
    <div class="car-listing" id="results">
        <?php $cars->displayCardCars($cars) ?>

    </div>


</div>

    <!-- Modal addCars-->
    <!--<div class="modal fade" id="modalAddCars" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un véhicule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>

            </div>
        </div>
    </div>-->

    <!-- Modal sellCar-->
    <div class="modal fade" id="modalSellCar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Information du véhicule</h5>
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

</div>

