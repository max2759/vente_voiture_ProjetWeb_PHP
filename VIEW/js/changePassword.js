$(document).ready(function (){

    var newPass = $('#newPass');
    var newPass2 = $('#newPass2');
    var allPass = $('#newPass, #newPass2');

    $(document).on('click', '.modal-clog', function(){
        $('#modalChangePassword').modal({backdrop: 'static', keyboard: false, show: true});
    })

    allPass.on('keyup', function () {
        $('.passwordChangeAlert').remove();
        if (newPass.val() !== "" && newPass2.val() !== "") {
            if (newPass.val() == newPass2.val()) {
                allPass.css("border-color", "#5cb85c");
                $('.passwordChangeAlert').hide();
            } else {
                allPass.css("border-color", "#d9534f");
                $("<div class=\"alert alert-danger passwordChangeAlert\" role=\"alert\">Les mots de passe ne correspondent pas !</div>").insertAfter(newPass2);
            }

        } else {
            allPass.css("border-color", "#d9534f");
            $("<div class=\"alert alert-danger passwordChangeAlert\" role=\"alert\">Entrez un mot de passe!</div>").insertAfter(newPass2);
        }
    })
})