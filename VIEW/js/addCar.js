$(document).ready(function(){

    var model = $('#model');
    var color = $('#color');


    model.on('keyup', function(){

        if(model.val() !== ""){
            $('.modelAlert').remove();
            model.css("border-color", "#5cb85c");
        }else{
            $("<div class=\"alert alert-danger modelAlert\" role=\"alert\">Le champ doit être rempli !</div>").insertAfter(model);
            model.css("border-color", "#d9534f");
        }
    })

    color.on('keyup', function () {
        $('.colorAlert').remove();
        if(color.val() !==""){
            $('.colorAlert').remove();
            color.css("border-color", "#5cb85c");
        }else{
            $("<div class=\"alert alert-danger colorAlert\" role=\"alert\">Le champ doit être rempli !</div>").insertAfter(color);
            color.css("border-color", "#d9534f");
        }
    })

    $('input').keyup(function () {
        if(model.val() !=="" && color.val() !=""){
            $('#submitCars').prop("disabled", false);
        }else{
            $('#submitCars').prop("disabled", true);
        }
    })

})