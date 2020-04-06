$(document).ready(function () {

        $(document).on('click','#activation',function(){

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
                return $(this).text();
            }).get();

            var row_ID = data[1];


            $.ajax({
                url:"../CONTROL/userActivation.php",
                method: "POST",
                data:{row_ID:row_ID},
                async: true,
                success: function(data){
                    location.reload();
                }
            })

        })

});