$(document).ready(function() {
  $("#texte").click(function() {
 $(this).css("height","60");
 });
 $("#bouton").click(function() {
 $("#texte").prop("disabled",false);
function AjaxOK(data) {
	$(".fond").remove();
    $("#messages").prepend(data);
}
function AjaxFailed(data) {
    console.log("faux");
}
 var params = "msg="+$("#texte").val();
 console.log(params);
 $.ajax({
 type: 'POST',
 url: 'ajax.php',
 data: params,
 success: AjaxOK,
 error: AjaxFailed
});
});
});
