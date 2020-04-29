<?php


class orderDetails extends model
{
    var $table = 'orders_details od';
    var $data;

    function displayCarstoShop($value){
        foreach($value as $k){
            echo '<!-- PRODUCT -->
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
                        <input type="number" name="finalPrice" class="finalPrice" value="'.$k->priceUnitOrder.'" step="100">
                        </span>
                        </div>
                        <!--<div class="col-4 col-sm-4 col-md-4">
                            <div class="quantity">                             
                                <input type="number" step="1" max="1" min="1" value="1" title="Qty" class="qty"
                                       size="4">                            
                            </div>
                        </div>-->
                        <div class="col-2 col-sm-2 col-md-2 text-right">
                            <button type="button" class="btn btn-outline-danger btn-xs del-cars" id="'.$k->cars_ID.'">
                                <i class="fa fa-trash" aria-hidden="true"></i>                         
                            </button>
                        </div>
                        <div hidden id="orderID">'.$k->orders_ID.'</div>
                    </div>
                </div>
                <hr>
                <!-- END PRODUCT -->';
        }
    }

    // appel la procédure stocké qui permet de vendre une voiture
    function insertOrderDetails($carsID, $orderID, $unitPrice){
        $req = $this->stmt->prepare('CALL insertOrderDetails(:pCars_ID, :pOrders_ID, :pPriceUnitOrder)');
        $req->bindParam(':pCars_ID', $carsID, PDO::PARAM_INT);
        $req->bindParam(':pOrders_ID', $orderID, PDO::PARAM_INT);
        $req->bindParam(':pPriceUnitOrder', $unitPrice, PDO::PARAM_INT);
        $req->execute();
    }

    function deleteOrderDetails($carsID){
        $req = $this->stmt->prepare('CALL deleteOrderDetails(:pCarsID)');
        $req->bindParam(':pCarsID', $carsID, PDO::PARAM_INT);
        $req->execute();
    }

}