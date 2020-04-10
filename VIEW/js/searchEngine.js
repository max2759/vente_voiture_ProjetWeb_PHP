function search(myID, myfile){
    $(document).ready(function() {
        $("#" + myID).on('keyup', function () {
           var search = $("#" + myID);
            var searchVal = $("#" + myID).val();
            if (searchVal != '') {
                $("#results").html('');
                $.ajax({
                    url: "../CONTROL/"+myfile,
                    method: 'POST',
                    data: {search: searchVal},
                    async: true,
                    success: function (data) {
                        $('#results').html(data);
                    }
                });
            } else {
                location.reload();
            }
        })
    })
}

function radioChoice(radioClass, myFile){
    $(document).ready(function(){
        $('.'+ radioClass).on('click', function(){
            var value = $(this).val();
            $.ajax({
                url: "../CONTROL/" + myFile,
                method: "POST",
                data:{value: value},
                async: true,
                success: function(data){
                    $('#results').html(data);
                }
            })
    })
    })
}


search('searchEmpl', 'search.php');
search('searchCar', 'searchCar.php');
radioChoice('radioEmployee','radioChoice.php');
radioChoice('radioCars','radioChoiceCar.php');
