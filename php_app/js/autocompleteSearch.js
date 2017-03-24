$(document).ready(function(){
     $('#searchName').keyup(function() {
        $.ajax({
            type: 'POST',
            url: 'usernamesDatabase.php',
            data: 'id=testdata',
            cache: false,
            success: function(result) {
            console.log(result);
            $("input#searchName").autocomplete({source: "usernamesDatabase.php"});
            },
            error: function() {
            }
        });
     });
});