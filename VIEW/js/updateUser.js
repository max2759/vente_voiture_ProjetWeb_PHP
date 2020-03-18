$(document).ready(function() {

    $('.container').on('click', '.button', function () {
        var user_ID = $(this).attr("id");
        $.ajax({
            type: 'POST',
            url: "../CONTROL/updateUser.php",
            data: {user_ID: user_ID},
            async: true,
            success: function (data) {
                //Appel de mon modal d'inscription d'utilisateur
                $('#modalAddUser').modal('show');
                $('#pass').remove();
                $('label').remove();
                $('#pass2').remove();
                $('.modal-title').text("Modifier employé");
                $('#validateUser').prop('disabled', false);
            }
        })
    })
})