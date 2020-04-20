$(document).ready(function(){

    $('.add_to_cart').on('click', function(){
     //Récupère id de la voiture
     var carsId = this.id;
        $.ajax({
            url: '../CONTROL/shopping-cart-add.php',
            method: 'POST',
            data: {carsId: carsId},
            success:function () {
                $('<div class="alert alert-success add-basket-success"><i class="fas fa-cart-arrow-down"></i> Ajouté au panier !</div>').prependTo('.car-page');

                setTimeout(function(){
                    if ($('.add-basket-success').length > 0) {
                        $('.add-basket-success').remove();
                    }
                }, 5000)
            }
        })
    })
})