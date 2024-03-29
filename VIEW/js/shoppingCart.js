$(document).ready(function(){

    // Ajout de la voiture dans le panier en fonction de l'id
    $(document).on('click','.add_to_cart', function(){
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
                        location.reload();
                    }
                }, 3000)
            }
        })
    })

    // Supprime la voiture grâce à l'id passer dans le bouton delete
    $('.del-cars').on('click', function(){
        var carsID = this.id;
        var orderID = $('#orderID').html();

        $.ajax({
            url:'../CONTROL/shopping-cart-delete.php',
            method:'POST',
            data:{carsID:carsID, orderID:orderID},
            success:function(){
                $('<div class="alert alert-danger del-basket-success"><i class="fas fa-cart-arrow-down"></i> Voiture supprimée !</div>').prependTo('.card-custom');
                setTimeout(function(){
                    if ($('.del-basket-success').length > 0) {
                        $('.del-basket-success').remove();
                        location.reload();
                    }
                }, 1000)
            }
        })
    })

    // validation du panier lors du clique sur valider
    $('.validate-basket').on('click', function(){
        // Création d'array vide pour stocker les carsID et le prix
        var carsIDArray = [];
        var finalPriceArray = [];

        var orderID = $('#orderID').html();

        // On va remplir les tableaux avec les valeurs de CarsID et du prix
        $('.carsID').each(function() {
            carsIDArray.push($(this).val());
        })
        $('.finalPrice').each(function() {
            finalPriceArray.push($(this).val());
        })

        // on envoie le tout à php via ajax
        $.ajax({
            url: '../CONTROL/shopping-cart-validate.php',
            method: 'POST',
            data:{orderID:orderID, finalPriceArray:finalPriceArray, carsIDArray:carsIDArray},
            success: function(){
                location.reload();
            }
        })
    })

    // permet de calculer les valeurs rentrées dans chaque input dans le panier
    $('.fp').on('input', '.finalPrice', function(){
        var totalSum = 0;
        $('.finalPrice').each(function(){
            var inputVal = $(this).val();
            if($.isNumeric(inputVal)){
                totalSum += parseFloat(inputVal);
            }
        });
        $('#finalPriceSum').text(addSpace(totalSum) + ' €');
    })


    function addSpace(numberString) {
        var resultString = numberString + '' ,
            x = resultString.split('.'),
            x1 = x[0],
            x2 = x.length > 1 ? ',' + x[1] : '',
            rgxp = /(\d+)(\d{3})/;

        while (rgxp.test(x1)) {
            x1 = x1.replace(rgxp, '$1' + ' ' + '$2');
        }

        return x1 + x2;
    }

    //Regarde si la fênetre est au dessus si pas affiche le bouton
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#myBtn').fadeIn();
        } else {
            $('#myBtn').fadeOut();
        }
    });

    //clique sur le bouton, retour au dessus de la page
    $('#myBtn').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });


})