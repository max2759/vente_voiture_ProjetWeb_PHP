$(document).on('click','.update', function(){
    var user_ID = $(this).attr("id");
    $.ajax({
        type: 'POST',
        url:"../CONTROL/updateUser.php",
        data: {user_ID : user_ID},
        async: true
    })
})