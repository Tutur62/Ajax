$(document).ready(function() {
  $("#texte").click(function() {
 $(this).css("height","60");
 });
 $("#bouton").click(function() {
 $("#texte").prop("disabled",true);
 $("#bouton").prop("disabled",true);
 $("#bouton").css("opacity","0.5");
function AjaxSucceeded(data) {
    alert("vrai");
}
function AjaxFailed(data) {
    alert("faux");
}
 var params = "msg="+$("#texte").val();
 console.log(params);
 $.ajax({
 type: 'POST',
 url: '.ajax.php',
 data: params,
 success: AjaxSucceeded,
 error: AjaxFailed
});

 });
 
 });
