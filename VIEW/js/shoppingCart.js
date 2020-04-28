$(document).ready(function(){

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
                        /*location.reload();*/
                    }
                }, 3000)
            }
        })
    })

    // Supprime la voiture grâce à l'id passer dans le bouton delete
    $('.del-cars').on('click', function(){
        var carsID = this.id;
        $.ajax({
            url:'../CONTROL/shopping-cart-delete.php',
            method:'POST',
            data:{carsID:carsID},
            success:function(){
                location.reload();
                $('<div class="alert alert-danger del-basket-success"><i class="fas fa-cart-arrow-down"></i> Voiture supprimée !</div>').prependTo('.card-custom');
                setTimeout(function(){
                    if ($('.del-basket-success').length > 0) {
                        $('.del-basket-success').remove();
                    }
                }, 5000)
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
        var resultString = numberString + '',
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