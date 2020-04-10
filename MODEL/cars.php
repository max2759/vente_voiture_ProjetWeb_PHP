<?php


class cars extends model
{
    var $table = 'cars c';
    var $data;

    function displayLoopResultCars($cars){
        foreach ($cars->data as $k) {
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
        }
    }

}