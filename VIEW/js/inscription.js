$(document).ready(function () {

    var pseudo = $('#pseudo');
    var nom = $('#nom');
    var prenom = $('#prenom');
    var pass = $('#pass');
    var pass2 = $('#pass2');
    var allPass = $('#pass, #pass2');
    var validateUser = $('#validateUser');
    var pseudoReg = new RegExp("^[a-z]{3}[a-z]{3}$");
    var nomPreReg = new RegExp("^[A-Z]+(([',. -][A-Za-zÀ-ÿ])?[A-Za-zÀ-ÿ]*)*$");

    pseudo.on('keyup', function () {
        $('.pseudoAlert').remove();
        if (pseudo.val() !== "" && pseudoReg.test(pseudo.val())) {
            var pseudoVal = pseudo.val();
            var bool = true;
            $.ajax({
                type: 'POST',
                url: '../CONTROL/checkUser.php',
                data: {pseudo: pseudoVal},
                async: true
            }).done(function (data) {
                $('.pseudoAlert').remove();
                if (data !== 'true') {
                    pseudo.css("border-color", "#5cb85c");
                    $('.pseudoAlert').remove();
                    bool = true;
                } else {
                    pseudo.css("border-color", "#d9534f");
                    $("<div class=\"alert alert-danger pseudoAlert\" role=\"alert\"> L'utilisateur existe déjà !</div>").insertAfter(pseudo);
                    bool = false;
                }
            })
        } else {
            $("<div class=\"alert alert-danger pseudoAlert\" role=\"alert\">Le nom d'utilisateur doit être au format nompre avec 3 lettres pour le prénom et 3 pour le nom !</div>").insertAfter(pseudo);
            pseudo.css("border-color", "#d9534f");
        }
    })

    nom.on('keyup', function () {
        $('.nomAlert').remove();
        // Vérifie que nom est pas vide et qu'il correspond à la regex
        if (nom.val() !== "" && nomPreReg.test(nom.val())) {
            $('.nomAlert').remove();
            nom.css("border-color", "#5cb85c");
        } else {
            $("<div class=\"alert alert-danger nomAlert\" role=\"alert\">Le champ doit être rempli et le nom doit commencer par une majuscule !</div>").insertAfter(nom);
            nom.css("border-color", "#d9534f");
        }
    })

    prenom.on('keyup', function () {
        $('.prenomAlert').remove();
        // idem nom
        if (prenom.val() !== "" && nomPreReg.test(prenom.val())) {
            $('.prenomAlert').hide();
            prenom.css("border-color", "#5cb85c");
        } else {
            $("<div class=\"alert alert-danger prenomAlert\" role=\"alert\">Le champ doit être rempli et le prénom doit commencer par une majuscule !</div>").insertAfter(prenom);
            prenom.css("border-color", "#d9534f");
        }
    })

    allPass.on('keyup', function () {

        $('.passwordAlert').remove();
        var passval = pass.val();
        var pass2val = pass2.val();

        // Vérifie que mot de passe est pas vide
        if (passval !== "" && pass2val !== "") {
            // vérifie que longueur mot de passe est > 4
            if(passval.length >= 4 && pass2val.length >= 4){
                // Vérifier que ce qu'on rentre dans le premier champ mdp correspond au champ répeter mdp
                if (passval === pass2val) {
                    allPass.css("border-color", "#5cb85c");
                    $('.passwordAlert').hide();
                } else {
                    allPass.css("border-color", "#d9534f");
                    $("<div class=\"alert alert-danger passwordAlert\" role=\"alert\">Les mots de passe ne correspondent pas !</div>").insertAfter(pass2);
                }
            }else{
                allPass.css("border-color", "#d9534f");
                $("<div class=\"alert alert-danger passwordAlert\" role=\"alert\">Le mot de passe doit contenir au moins 4 caractères !</div>").insertAfter(pass2);
            }

        } else {
            allPass.css("border-color", "#d9534f");
            $("<div class=\"alert alert-danger passwordAlert\" role=\"alert\">Entrez un mot de passe!</div>").insertAfter(pass2);
        }
    })

    $('input').keyup(function () {

        // Vérifier que les champs ne sont pas vide
        if(pseudo.val() !=="" && nom.val() !=="" && prenom.val() !=="" && pass.val() !=="" && pass2.val() !=="" ){
            // Vérifier qu'il n'y a pas de message d'erreur
            if(!($('.nomAlert').length) && !($('.pseudoAlert').length) && !($('.passwordAlert').length) && !($('.prenomAlert').length)){
                validateUser.prop("disabled", false);
            }else{
                validateUser.prop("disabled", true);
            }
        }else{
            if($('.nomAlert').length && $('.pseudoAlert').length && $('.passwordAlert').length && $('.prenomAlert').length){
                validateUser.prop("disabled", true);
            }else{
                validateUser.prop("disabled", true);
            }
        }
    })

})

