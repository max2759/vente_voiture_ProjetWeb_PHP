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
                        foreach ($_SESSION['panier'] as $k){
                  echo      '<!-- PRODUCT -->
                <div class="row">               
                    <div class="col-12 col-sm-12 col-md-2 text-center">
                        <img class="img-responsive" src="../VIEW/img/'.$k->picture.'" alt="prewiew" width="120" height="80">
                    </div>
                    <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                        <h4 class="product-name"><strong>'.$k->name.'</strong></h4>
                        <h4>
                            <small>'.$k->model.'</small>
                        </h4>
                    </div>
                    <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                        <div class="col-4 col-sm-10 col-md-25 text-md-right fp" style="padding-top: 5px">
                        <span class="input-symbol-euro">
                        <input type="number" name="finalPrice" class="finalPrice" id="finalPrice" value="'.$k->priceUnitOrder.'" step="100">
                        </span>
                        </div>                       
                        <div class="col-2 col-sm-2 col-md-2 text-right">
                            <button type="button" class="btn btn-outline-danger btn-xs del-cars" id="'.$k->cars_ID.'">
                                <i class="fa fa-trash" aria-hidden="true"></i>                         
                            </button>
                        </div>
                        <div hidden id="orderID">'.$k->orders_ID.'</div>
                        <input type="hidden" class="carsID" value="'.$k->cars_ID.'">
                       
                    </div>
                </div>
                <hr>';
                        }
                    }else{
                        echo '<h1> Panier vide </h1>';
                    }
                ?>

            </div>
            <div class="card-footer">
                <div class="pull-right" style="margin: 10px">
                    <input type="submit" class="btn btn-success validate-basket pull-right">
                    <div class="pull-right" style="margin: 5px">
                        Prix final: <b id="finalPriceSum"> 0 €</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php /*number_format($basket->total($_SESSION['panier']), 2, ',', ' ')*/  ?>
