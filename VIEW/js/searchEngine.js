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
        }else{
           $.ajax({
               url:"../CONTROL/radioChoice.php",
               method:"POST",
               data:{value:'option1'},
               async:true,
               success: function(data){
                   $('#results').html(data);
               }
           })
        }
    })

    $('input[type=radio]').on('click', function(){
        var value = $(this).val();
        $('#repChoice').html(value);
        $.ajax({
            url: "../CONTROL/radioChoice.php",
            method: "POST",
            data:{value: value},
            async: true,
            success: function(data){
                $('#results').html(data);
            }
        })
    })
})