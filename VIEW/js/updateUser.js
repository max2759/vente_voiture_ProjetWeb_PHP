$(document).ready(function () {

    var nomEdit = $('#nomEdit');
    var prenomEdit = $('#prenomEdit');
    var pseudoEdit = $("#pseudoEdit");
    var employee_id = $("#employee_id");
    var nomPreReg = new RegExp("^[A-Z]+(([',. -][A-Za-zÀ-ÿ])?[A-Za-zÀ-ÿ]*)*$");
    var allPassEdit = $('#newPassEdit, #newPass2Edit');
    var newPassEdit = $('#newPassEdit');
    var newPassEdit2 = $('#newPass2Edit');


    $(document).on('click', '.update', function () {

        // appel du modal updateUser
        $("#modalUpdateUser").modal({backdrop: 'static', keyboard: false, show: true});

        $tr = $(this).closest('tr');

        // récupère la ligne dans laquelle le bouton modifier a été cliqué et les mets dans un tableau
        var data = $tr.children('td').map(function () {
            return $(this).text();
        }).get();

        employee_id.val(data[1]);
        nomEdit.val(data[2]);
        prenomEdit.val(data[3]);
        pseudoEdit.val(data[4]);
        allPassEdit.val("");


        allPassEdit.css("border", "1px solid #ced4da");
        nomEdit.css("border", "1px solid #ced4da");
        prenomEdit.css("border", "1px solid #ced4da");
        $('.inputAddAlert').remove();
        $('.inputEditAlert').remove();
        $('.passwordEditAlert').remove();
        $('.nomEditAlert').remove();
        $('.prenomEditAlert').remove();
    })

    pseudoEdit.prop("readonly", true);

    nomEdit.on('keyup', function () {
        $('.nomEditAlert').remove();
        if (nomEdit.val() !== "" && nomPreReg.test(nomEdit.val())) {
            $('.nomEditAlert').remove();
            nomEdit.css("border-color", "#5cb85c");
        } else {
            $("<div class=\"alert alert-danger nomEditAlert\" role=\"alert\">Le champ doit être rempli et le nom doit commencer par une majuscule !</div>").insertAfter(nomEdit);
            nomEdit.css("border-color", "#d9534f");
        }
    })

    prenomEdit.on('keyup', function () {
        $('.prenomEditAlert').remove();
        if (prenomEdit.val() !== "" && nomPreReg.test(prenomEdit.val())) {
            $('.prenomEditAlert').hide();
            prenomEdit.css("border-color", "#5cb85c");
        } else {
            $("<div class=\"alert alert-danger prenomEditAlert\" role=\"alert\">Le champ doit être rempli et le prénom doit commencer par une majuscule !</div>").insertAfter(prenomEdit);
            prenomEdit.css("border-color", "#d9534f");
        }
    })

    allPassEdit.on('keyup', function () {

        $('.passwordEditChangeAlert').remove();
        var newPassVal = newPassEdit.val();
        var newPassVal2 = newPassEdit2.val();

        if (newPassVal !== "" && newPassVal2 !== "") {
            if (newPassVal.length >= 4 && newPassVal2.length >= 4) {
                if (newPassVal === newPassVal2) {
                    allPassEdit.css("border-color", "#5cb85c");
                    $('.passwordEditChangeAlert').hide();
                } else {
                    allPassEdit.css("border-color", "#d9534f");
                    $("<div class=\"alert alert-danger passwordEditChangeAlert\" role=\"alert\">Les mots de passe ne correspondent pas !</div>").insertAfter(newPassEdit2);
                }
            } else {
                allPassEdit.css("border-color", "#d9534f");
                $("<div class=\"alert alert-danger passwordEditChangeAlert\" role=\"alert\">Le mot de passe doit contenir au moins 4 caractères !</div>").insertAfter(newPassEdit2);
            }
        } else {
            allPassEdit.css("border-color", "#d9534f");
            $("<div class=\"alert alert-danger passwordEditChangeAlert\" role=\"alert\">Entrez un mot de passe!</div>").insertAfter(newPassEdit2);
        }
    })

    $('input').keyup(function () {

        if (nomEdit.val() !== "" && prenomEdit.val() !== "" && pseudoEdit.val() !== "") {
            if (!($('.nomEditAlert').length) && !($('.prenomEditAlert').length)) {
                $("#validateUpdate").prop("disabled", false);
            }

        } else {
            if ($('.nomEditAlert').length && $('.prenomEditAlert').length) {
                $("#validateUpdate").prop('disabled', true);
            } else {
                $("#validateUpdate").prop("disabled", true);
            }
        }


    })

})
