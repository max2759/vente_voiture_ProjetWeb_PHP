$(document).ready(function () {

        $(document).on('click','#activation',function(){

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
                return $(this).text();
            }).get();

            var row_ID = data[0];

            alert(row_ID);

        })

})