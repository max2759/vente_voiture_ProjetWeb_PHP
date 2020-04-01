$(document).ready(function () {
    var pseudoEdit = $("#pseudoEdit");
    var nomEdit = $('#nomEdit');
    var prenomEdit=$('#prenomEdit');
    var passEdit = $("#passEdit");
    var employee_id = $("#employee_id");
    var nomPreReg = new RegExp("^[A-Z]+(([',. -][A-Za-zÀ-ÿ])?[A-Za-zÀ-ÿ]*)*$");


    $(document).on('click','.update', function(){

       $("#modalUpdateUser").modal({backdrop: 'static', keyboard: false, show: true});

           $tr = $(this).closest('tr');

           var data = $tr.children('td').map(function(){
               return $(this).text();
           }).get();

            employee_id.val(data[0]);
            nomEdit.val(data[1]);
            prenomEdit.val(data[2]);
            pseudoEdit.val(data[3]);
            passEdit.val("");


            passEdit.css("border","1px solid #ced4da");
            nomEdit.css("border","1px solid #ced4da");
            prenomEdit.css("border","1px solid #ced4da");
            $('.inputAlert').remove();
            $('.passwordAlert').remove();
            $('.nomAlert').remove();
            $('.prenomAlert').remove();
   })

    pseudoEdit.prop("readonly", true);

    nomEdit.on('keyup', function(){
        $('.nomAlert').remove();
        if(nomEdit.val() !== "" && nomPreReg.test(nomEdit.val())){
            $('.nomAlert').remove();
            nomEdit.css("border-color", "#5cb85c");
        }else{
            $("<div class=\"alert alert-danger nomAlert\" role=\"alert\">Le champ doit être rempli et le nom doit commencer par une majuscule !</div>").insertAfter(nomEdit);
            nomEdit.css("border-color", "#d9534f");
        }
    })

    prenomEdit.on('keyup', function(){
        $('.prenomAlert').remove();
        if(prenomEdit.val() !== "" && nomPreReg.test(prenomEdit.val())){
            $('.prenomAlert').hide();
            prenomEdit.css("border-color", "#5cb85c");
        }else{
            $("<div class=\"alert alert-danger prenomAlert\" role=\"alert\">Le champ doit être rempli et le prénom doit commencer par une majuscule !</div>").insertAfter(prenomEdit);
            prenomEdit.css("border-color", "#d9534f");
        }
    })


    passEdit.on('keyup', function () {
        $('.passwordAlert').remove();
        if(passEdit.val() !==""){
                passEdit.css("border-color", "#5cb85c");
                $('.passwordAlert').hide();
                $("#validateUpdate").prop('disabled', false);
            }else{
                passEdit.css("border-color", "#d9534f");
                $("<div class=\"alert alert-danger passwordAlert\" role=\"alert\">Le mot de passe est vide !</div>").insertAfter(passEdit);
                $("#validateUpdate").prop("disabled", true);
            }
    })

    $('input').keyup(function () {
        $('.inputAlert').remove();
        if($('.nomAlert').length || $('.prenomAlert').length || $('.passwordAlert').length){
            passEdit.css("border-color", "#d9534f");
            $("<div class=\"alert alert-danger inputAlert\" role=\"alert\">Un des champs n'est pas bon !</div>").insertAfter(passEdit);
            $("#validateUpdate").prop("disabled", true);
        }else{
            if(passEdit.val() !=="" || nomEdit.val() !=="" || prenomEdit.val() !==""){
                if($('.nomAlert').length && $('.prenomAlert').length){
                    passEdit.css("border-color", "#d9534f");
                    $("<div class=\"alert alert-danger inputAlert\" role=\"alert\">Un des champs n'est pas bon !</div>").insertAfter(passEdit);
                    $("#validateUpdate").prop("disabled", true);
                }else{
                    passEdit.css("border-color", "#5cb85c");
                    $('.inputAlert').hide();
                    $("#validateUpdate").prop('disabled', false);
                }
            }else{
                passEdit.css("border-color", "#d9534f");
                $("<div class=\"alert alert-danger inputAlert\" role=\"alert\">Un des champs n'est pas rempli !</div>").insertAfter(passEdit);
                $("#validateUpdate").prop("disabled", true);
            }
        }
    })

  $("#formUpdateUser").on('hidden.bs.modal', function(){

  })


})