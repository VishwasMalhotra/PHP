$(document).ready(function(){
$("#clear").click(function(){
    $('.toappend').append('<label> Select file to upload: </label><input type="file" name="fileToUpload" id="fileToUpload" accept="application/pdf">');
    $('.hidethis').hide();
$.ajax({
type: "POST",
url: "../shared/unseturl.php",
data: "action=unsetsession",
success: function(msg){
if(msg=="success")
{
}
},
error: function(msg){
alert("Error: cannot load page.");
}
});
});
});