<?php

$form = new Form("POST", "#", "promoForm", "promoForm");
$form->setNumber("Réduction", "promoField", "promoField", "","100","100", "", "");

?>
<div class="container">
    <div class="container">
        <div class="card shopping-cart card-custom">
            <div class="card-header bg-dark text-light basket-header">
                <div class="basket-logo">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Panier
                </div>
                <div class="back-to-cars">
                    <a href="cars.php" class="btn btn-outline-info btn-sm btn-back pull-right">Retour sur la page des voitures</a>
                </div>

            </div>
            <div class="card-body shop-body">

                <?php
                    if(!empty($_SESSION['panier'])){
                        $orderDetails->displayCarstoShop($_SESSION['panier']);
                    }else{
                        echo '<h1> Panier vide </h1>';
                    }
                ?>
            </div>
            <div class="card-footer">
                <div class="pull-right" style="margin: 10px">
                    <a href="" class="btn btn-success validate-basket pull-right">Valider</a>
                    <div class="pull-right" style="margin: 5px">
                        Prix final: <b id="finalPriceSum"> 0 €</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php /*number_format($basket->total($_SESSION['panier']), 2, ',', ' ')*/  ?>
