<?php

require_once('core.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$value = $_POST['value'];
$cars = model::load("cars");


if($value == 'option1'){
    $cars->readDB('b.name, c.model, c.color, c.kilometer, c.horsepower, c.unitprice, c.fuel, c.isActive, c.year, c.cars_ID, c.picture', '', 'brands b on b.brands_ID = c.brands_ID');
    if(!empty($cars->data)){
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
    } else{
        echo '<h1 style="margin: auto "><i class="fas fa-car-crash"></i> PAS DE RÉSULTATS</h1>';
    }

}elseif ($value == 'option2'){

    $cars->readDB('b.name, c.model, c.color, c.kilometer, c.horsepower, c.unitprice, c.fuel, c.isActive, c.year, c.cars_ID, c.picture','c.isActive = 1', 'brands b on b.brands_ID = c.brands_ID');

    if(!empty($cars->data)){
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
    } else{
        echo '<h1 style="margin: auto "><i class="fas fa-car-crash"></i> PAS DE RÉSULTATS</h1>';
    }

}else{

    $cars->readDB('b.name, c.model, c.color, c.kilometer, c.horsepower, c.unitprice, c.fuel, c.isActive, c.year, c.cars_ID, c.picture','c.isActive = 0', 'brands b on b.brands_ID = c.brands_ID');

    if(!empty($cars->data)){
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
    } else{
        echo '<h1 style="margin: auto "><i class="fas fa-car-crash"></i> PAS DE RÉSULTATS</h1>';
    }

}