<?php

/*** Form Add Car ***/

$year= Date('Y');

$formAddCars = new Form("POST", "../CONTROL/addCar.php", "addCars", "addCars", "multipart/form-data");
$formAddCars->setOptionBrands("Marque", "brands", "brands");
$formAddCars->setText("Modèle", "modèle", "model","model");
$formAddCars->setText("Couleur", "couleur", "color","color");
$formAddCars->setNumber("Kilométrage", "km", "km","kilométrage","0", "1","","");
$formAddCars->setNumber("Chevaux", "cv", "cv","chevaux","1", "1", "", "5000");
$formAddCars->setNumber("Prix de vente", "price","price", "prix&nbsp;de&nbsp;vente", "100", "1", "", "");
$formAddCars->setNumber("Année", "yearCar", "yearCar", "Année", "1900", "1",$year, $year);
$formAddCars->setOptionFuel("Carburant", "fuel", "fuel");
$formAddCars->setPicture("image");
$formAddCars->modalSend("submitCars","submitCars","disabled");

?>
<div class="container">

    <?php
    /**
     * Message d'erreur ajout voiture via le back end php
     */
    if (isset($_SESSION['errorCar'])) {
        $msg = $_SESSION['errorCar'];
        echo '<div class="alert alert-danger errorCar">' . $msg . '</div>';
        unset($_SESSION['errors']);

    }

    /**
    * Message pour avertir que l'ajout a bien été réalisée
    */
    if(isset($_SESSION['successCar'])){
        $msg = $_SESSION['successCar'];
        echo '<div class="alert alert-success successCar">' . $msg . '</div>';
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
        <hr style="width: 100%">
        <!-- search engine -->
        <div>
            <input type="search" name="searchCar" id="searchCar" placeholder="Rechercher un véhicule..."
                   class="form-control">
        </div>

        <hr style="width: 100%">
        <!-- Button trigger modal -->
        <div class="add-box">
            <button type="button" class="btn btn-info col-auto" data-backdrop="static" data-toggle="modal" data-target="#modalAddCars">
                <i class="far fa-plus-square"></i> Ajouter
            </button>
        </div>
    </div>

    <!-- Display Car -->
    <div class="car-listing" id="results">
        <?php $cars->displayCardCars($cars); ?>
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
                    $formAddCars->getForm();
                    ?>
                </div>

            </div>
        </div>
    </div>

</div>

