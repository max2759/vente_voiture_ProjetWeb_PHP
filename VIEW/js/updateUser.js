$(document).ready(function () {
    var pseudoEdit = $("#pseudoEdit");
    var nomEdit = $('#nomEdit');
    var prenomEdit = $('#prenomEdit');
    var passEdit = $("#passEdit");
    var employee_id = $("#employee_id");
    var nomPreReg = new RegExp("^[A-Z]+(([',. -][A-Za-zÀ-ÿ])?[A-Za-zÀ-ÿ]*)*$");


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
        passEdit.val("");


        passEdit.css("border", "1px solid #ced4da");
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


    passEdit.on('keyup', function () {
        $('.passwordEditAlert').remove();
        if (passEdit.val() !== "") {
            passEdit.css("border-color", "#5cb85c");
            $('.passwordEditAlert').hide();
        } else {
            passEdit.css("border-color", "#d9534f");
            $("<div class=\"alert alert-danger passwordEditAlert\" role=\"alert\">Le mot de passe est vide !</div>").insertAfter(passEdit);
        }
    })

    $('input').keyup(function () {

        if(passEdit.val() !== "" && nomEdit.val() !== "" && prenomEdit.val() !== ""  && pseudoEdit.val() !==""){
            if(!($('.nomEditAlert').length) && !($('.prenomEditAlert').length) && !($('.passwordEditAlert').length)){
                $("#validateUpdate").prop("disabled", false);
            }else{
                $("#validateUpdate").prop('disabled', true);
            }

        }else{
            if($('.nomEditAlert').length && $('.prenomEditAlert').length && $('.passwordEditAlert').length){
                $("#validateUpdate").prop('disabled', true);
            }else{
                $("#validateUpdate").prop("disabled", true);
            }
        }


    })

})
