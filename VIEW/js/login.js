$(document).ready(function () {

    var pseudoLog = $('#pseudoLog');
    var passLog = $('#passLog');
    var validateConn = $('#validateConn');
    var pseudoLogVal = pseudoLog.val();
    var passLogVal = passLog.val();

    pseudoLog.on('blur', function(){
        $('.pseudoAlert').remove();
        if(pseudoLogVal !== ""){
            pseudoLog.css("border-color", "#5cb85c");
            passLog.css("border-color", "#5cb85c");
            $('.pseudoAlert').remove();
            bool = true;
        }else{
            passLog.css("border-color", "#d9534f");
            $("<div class=\"alert alert-danger pseudoAlert\" role=\"alert\"> L'utilisateur ou le mot de passe est vide !</div>").insertAfter(passLog);
            bool = false;
        }
    })

})