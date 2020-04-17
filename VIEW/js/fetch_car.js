$(document).ready(function(){

    $('.add_to_cart').on('click', function(){
     //Récupère id de la voiture
     var carsId = this.id;
        $.ajax({
            url: '../CONTROL/shopping-cart.php',
            method: 'POST',
            data: {carsId: carsId},
        })
    })
})