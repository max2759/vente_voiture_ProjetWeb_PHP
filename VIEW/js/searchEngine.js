$(document).ready(function(){
    $("#searchEmpl").on('keyup', function(){
        var search = $("#searchEmpl");
        var searchVal = $("#searchEmpl").val();
        if(searchVal !=''){
            $("#results").html('');
            $.ajax({
                url: "../CONTROL/search.php",
                method: 'POST',
                data: {search: searchVal},
                async: true,
                success: function(data){
                    $('#results').html(data);
                }
            });
        }
    })
})