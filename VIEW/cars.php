<?php
error_reporting(0);
if(!($_SESSION['isUser'] || $_SESSION['isAdmin'])){
    header('Location: ../CONTROL/connexion.php');
    exit();
}
?>
<div class="container">

    <table class="table table-hover">
        <th scope="col">Marque</th>
        <th scope="col">Modèle</th>
        <th scope="col">Couleur</th>
        <th scope="col">Kilométrage</th>
        <th scope="col">Chevaux</th>
        <th scope="col">Prix</th>
        <th scope="col">Carburant</th>

        <?php

       foreach ($cars->data as $k)
       {
           echo '<tr>';
           echo '<td>'.$k->name.'</td>';
           echo '<td>'.$k->model.'</td>';
           echo '<td>'.$k->color.'</td>';
           echo '<td>'.$k->kilometer.'</td>';
           echo '<td>'.$k->horsepower.'</td>';
           echo '<td>'.$k->unitprice.'</td>';
           echo '<td>'.$k->fuel.'</td>';
           echo '</tr>';
       }
        ?>
    </table>
</div>

