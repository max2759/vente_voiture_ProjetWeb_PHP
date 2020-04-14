function search(myID, myFile, myFile2){
    $(document).ready(function() {
        $("#" + myID).on('keyup', function () {
           var search = $("#" + myID);
            var searchVal = $("#" + myID).val();
            if (searchVal != '') {
                $("#results").html('');
                $.ajax({
                    url: "../CONTROL/"+myFile,
                    method: 'POST',
                    data: {search: searchVal},
                    async: true,
                    success: function (data) {
                        $('#results').html(data);
                    }
                });
            } else {
                $.ajax({
                    url: "../CONTROL/"+myFile2,
                    method: "POST",
                    data:{value: "option1"},
                    async: true,
                    success: function (data) {
                        $('#results').html(data);
                    }
                })
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


search('searchEmpl', 'search.php', 'radioChoice.php');
search('searchCar', 'searchCar.php','radioChoiceCar.php');
radioChoice('radioEmployee','radioChoice.php');
radioChoice('radioCars','radioChoiceCar.php');
