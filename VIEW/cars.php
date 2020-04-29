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
        <?php
        foreach ($cars->data as $k) {
        echo '<div class="card">';

            if($k->picture == NULL){
            echo '<img class="card-img-top" src="../VIEW/img/no-image-icon.png" alt="Card image cap" height="238,49px">';
            }else{
            echo '<img class="card-img-top" src="../VIEW/img/'.$k->picture.'" alt="Card image cap">';
            }

            echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $k->model . '</h5>';
                echo '<p class="card-text">' . $k->name . '</p>';
                if ($k->isActive == 1) {
                echo '<i class="fas fa-check"></i><span class="car-available"> Disponible</span>';
                } else {
                echo '<i class="fas fa-times"></i><span class="car-unavailable"> Vendue</span>';
                }
                echo '</div>';
            echo '<ul class="list-group list-group-flush">';
                echo  '<li class="list-group-item"><i class="fas fa-euro-sign"></i></i> ' . number_format($k->unitprice, 2, ',', ' ') . '</li>';
                echo  '<li class="list-group-item"><i class="fas fa-road"></i> ' . number_format($k->kilometer, 2, ',', ' ') . ' km</li>';
                echo '<li class="list-group-item"><i class="fas fa-tachometer-alt"></i> ' . $k->horsepower . ' CH</li>';
                echo '<li class="list-group-item"><i class="fas fa-calendar-alt"></i> ' . $k->year . '</li>';
                echo '<li class="list-group-item"><i class="fas fa-palette"></i> ' . $k->color . '</li>';
                echo '<li class="list-group-item"><i class="fas fa-gas-pump"></i> ' . $k->fuel . '</li>';
                echo '</ul>';
            echo '<div class="card-body">';
                if($k->isActive == 1){
                echo '<td><button type="button" class="btn btn-warning btn-xl add_to_cart" id="'.$k->cars_ID.'"><i class="fas fa-cart-arrow-down"></i> Ajouter au panier</button></td>';
                }else{
                echo '<td><button type="button" class="btn btn-warning btn-xl add_to_cart" id="'.$k->cars_ID.'" disabled><i class="fas fa-cart-arrow-down"></i> Ajouter au panier</button></td>';
                }
                echo '</div>
        </div>';
        }
        ?>
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

