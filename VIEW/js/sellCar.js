$(document).ready(function(){

    var marque = $('#marque');
    var model = $('#modele');
    var couleur = $('#couleur');
    var km = $('#km');
    var cv = $('#cv');
    var prix = $('#prix');
    var carburant = $('#carburant');
    var annee = $('#annee');
    var prixDeVente = $('#prix_de_vente');


    $(document).on('click','.sellCar', function () {
        $("#modalSellCar").modal({backdrop: 'static', keyboard: false, show: true});



       /* $tr = $(this).closest('tr');

        // récupère la ligne dans laquelle le bouton modifier a été cliqué et les mets dans un tableau
        var data = $tr.children('td').map(function () {
            return $(this).text();
        }).get();

        marque.val(data[3]);
        model.val(data[4]);
        couleur.val(data[5]);
        km.val(data[6]);
        cv.val(data[7]);
        prix.val(data[8]);
        annee.val(data[9]);
        carburant.val(data[10]);
        prixDeVente.val(data[8]);*/
    })

    marque.prop("readonly", true);
    model.prop("readonly", true);
    couleur.prop("readonly", true);
    km.prop("readonly", true);
    cv.prop("readonly", true);
    prix.prop("readonly", true);
    annee.prop("readonly", true);
    carburant.prop("readonly", true);
})



