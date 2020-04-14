<?php


class cars extends model
{
    var $table = 'cars c';
    var $data;

    function displayCardCars($cars)
    {
        foreach ($cars->data as $k) {
            echo '<div class="card">
            <img class="card-img-top" src="../VIEW/img/fordFiesta.png" alt="Card image cap">
            <div class="card-body">';
            echo '<h5 class="card-title">' . $k->model . '</h5>';
            echo '<p class="card-text">' . $k->name . '</p>';
            if ($k->isActive == 1) {
                echo '<i class="fas fa-check"></i><span class="car-available"> Disponible</span>';
            } else {
                echo '<i class="fas fa-times"></i><span class="car-unavailable"> Vendue</span>';
            }
            echo '</div>';
            echo '<ul class="list-group list-group-flush">';
            echo  '<li class="list-group-item"><i class="fas fa-euro-sign"></i></i> ' . $k->unitprice . '</li>';
            echo  '<li class="list-group-item"><i class="fas fa-road"></i> ' . $k->kilometer . ' km</li>';
            echo '<li class="list-group-item"><i class="fas fa-tachometer-alt"></i> ' . $k->horsepower . ' CH</li>';
            echo '<li class="list-group-item"><i class="fas fa-calendar-alt"></i> ' . $k->year . '</li>';
            echo '<li class="list-group-item"><i class="fas fa-palette"></i> ' . $k->color . '</li>';
            echo '<li class="list-group-item"><i class="fas fa-gas-pump"></i> ' . $k->fuel . '</li>';
            echo '</ul>';
            echo '<div class="card-body">';
            if($k->isActive == 1){
                echo '<td><button type="button" class="btn btn-warning btn-xl sellCar" id="car-'.$k->cars_ID.'">Vendre</button></td>';
            }else{
                echo '<td><button type="button" class="btn btn-warning btn-xl sellCar" id="car-'.$k->cars_ID.'" disabled>Vendre</button></td>';
            }
            echo '</div>
        </div>';
        }
    }

}