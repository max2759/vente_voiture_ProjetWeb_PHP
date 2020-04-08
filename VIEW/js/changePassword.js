$(document).ready(function (){

    var oldPass = $('#oldPass');
    var newPass = $('#newPass');
    var newPass2 = $('#newPass2');
    var allPass = $('#newPass, #newPass2');
    var pseudo = $('#employeePseudo');

    $(document).on('click', '.modal-clog', function(){
        $('#modalChangePassword').modal({backdrop: 'static', keyboard: false, show: true});
    })

    oldPass.on('keyup', function(){
        $('.oldPassAlert').remove();
        var oldPassVal = oldPass.val();
        var pseudoVal = pseudo.val();
        if(oldPassVal !==""){
            var bool = true;
            $.ajax({
                type: 'POST',
                url: '../CONTROL/checkPassword.php',
                data: {oldPass: oldPassVal, pseudo: pseudoVal},
                async: true
            }).done(function(data){
                $('.oldPassAlert').remove();
                    if(data == 'true'){
                        oldPass.css("border-color", "#5cb85c");
                        $('.oldPassAlert').hide();
                        bool = true;
                    }else{
                        oldPass.css("border-color", "#d9534f");
                        $("<div class=\"alert alert-danger oldPassAlert\" role=\"alert\">Le mot de passe n'est pas bon!</div>").insertAfter(oldPass);
                        bool = false;
                    }
            })
        }else{
            $("<div class=\"alert alert-danger oldPassAlert\" role=\"alert\">Le champ doit être rempli !</div>").insertAfter(oldPass);
            oldPass.css("border-color", "#d9534f");
        }
    })

    allPass.on('keyup', function () {

        $('.passwordChangeAlert').remove();
        var newPassVal = newPass.val();
        var newPassVal2 = newPass2.val();

        if (newPassVal !== "" && newPassVal2 !== "") {
            if(newPassVal.length >= 4 && newPassVal2.length >=4){
                if (newPassVal === newPassVal2) {
                    allPass.css("border-color", "#5cb85c");
                    $('.passwordChangeAlert').hide();
                } else {
                    allPass.css("border-color", "#d9534f");
                    $("<div class=\"alert alert-danger passwordChangeAlert\" role=\"alert\">Les mots de passe ne correspondent pas !</div>").insertAfter(newPass2);
                }
            }else{
                allPass.css("border-color", "#d9534f");
                $("<div class=\"alert alert-danger passwordChangeAlert\" role=\"alert\">Le mot de passe doit contenir au moins 4 caractères !</div>").insertAfter(newPass2);
            }
        } else {
            allPass.css("border-color", "#d9534f");
            $("<div class=\"alert alert-danger passwordChangeAlert\" role=\"alert\">Entrez un mot de passe!</div>").insertAfter(newPass2);
        }
    })

    $('input').keyup(function(){

        if(oldPass.val() !=="" && newPass.val() !=="" && newPass2.val() !==""){
            if(!($('.oldPassAlert').length) && !($('.passwordChangeAlert').length)){
                $('#validateChangePassword').prop("disabled", false);
            }else{
                $('#validateChangePassword').prop("disabled", true);
            }
        }else{
            if($('.oldPassAlert').length && $('.passwordChangeAlert').length){
                $('#validateChangePassword').prop("disabled", true);
            }else{
                $('#validateChangePassword').prop("disabled", true);
            }
        }
    })
})