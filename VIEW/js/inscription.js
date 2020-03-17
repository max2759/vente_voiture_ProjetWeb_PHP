$(document).ready(function(){

    var pseudo = $('#pseudo');
    var nom = $('#nom');
    var prenom = $('#prenom');
    var pass = $('#pass');
    var pass2 = $('#pass2');
    var allPass = $('#pass, #pass2');
    var validateUser = $('#validateUser');
    var pseudoReg = new RegExp("^[a-z]{3}[a-z]{3}$");
    var nomPreReg = new RegExp("^[A-Z]+(([',. -][A-Za-zÀ-ÿ])?[A-Za-zÀ-ÿ]*)*$");

    pseudo.on('blur', function () {
        $('.alert').remove();
        if(pseudo.val() !== "" && pseudoReg.test(pseudo.val())) {
            var pseudoVal = pseudo.val();
            var bool = true;
            $.ajax({
                type: 'POST',
                url: '../CONTROL/checkUser.php',
                data: {pseudo: pseudoVal},
                async: true
            }).done(function (data) {
                $('.alert').remove();
                if (data !== 'true') {
                    pseudo.css("border-color", "#5cb85c");
                    $('.alert').hide();
                    bool = true;
                }else{
                    pseudo.css("border-color", "#d9534f");
                    $("<div class=\"alert alert-danger\" role=\"alert\"> L'utilisateur existe déjà !</div>").insertAfter(pseudo);
                    bool = false;
                }
            })
        }else{
            $("<div class=\"alert alert-danger\" role=\"alert\">Le nom d'utilisateur doit être au format nompre avec 3 lettres pour le prénom et 3 pour le nom !</div>").insertAfter(pseudo);
            pseudo.css("border-color", "#d9534f");
        }
    })

    nom.on('blur', function(){
        $('.alert').remove();
        if(nom.val() !== "" && nomPreReg.test(nom.val())){
            $('.alert').hide();
            nom.css("border-color", "#5cb85c");
        }else{
            $("<div class=\"alert alert-danger\" role=\"alert\">Le champ doit être rempli et le nom doit commencer par une majuscule !</div>").insertAfter(nom);
            nom.css("border-color", "#d9534f");
        }
    })

    prenom.on('blur', function(){
        $('.alert').remove();
        if(prenom.val() !== "" && nomPreReg.test(prenom.val())){
            $('.alert').hide();
            prenom.css("border-color", "#5cb85c");
        }else{
            $("<div class=\"alert alert-danger\" role=\"alert\">Le champ doit être rempli et le prénom doit commencer par une majuscule !</div>").insertAfter(prenom);
            prenom.css("border-color", "#d9534f");
        }
    })


    allPass.on('keyup', function () {
        $('.alert').remove();
        if (pass.val() !== "" && pass2.val() !== "") {
            var passVal = pass.val();
            var pass2Val = pass2.val();
            if (pseudo !=="" && nom !== "" && prenom !=="" && pass !== "" && pass2!=="" && passVal == pass2Val && pass2Val == passVal) {
                validateUser.prop('disabled', false);
                pass2.css("border-color", "#5cb85c");
                pass.css("border-color", "#5cb85c");

            } else {
                validateUser.prop('disabled', true);
                pass.css("border-color", "#d9534f");
                pass2.css("border-color", "#d9534f");
                $("<div class=\"alert alert-danger\" role=\"alert\">Les mots de passes ne correspondent pas !</div>").insertAfter(pass2);
            }
        } else {
            validateUser.prop('disabled', true);
            pass2.css("border-color", "#d9534f");
            pass.css("border-color", "#d9534f");
            $("<div class=\"alert alert-danger\" role=\"alert\">Entrez un mot de passe!</div>").insertAfter(pass2);
        }
    })

})

