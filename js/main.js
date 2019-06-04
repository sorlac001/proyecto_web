$(document).ready(function(){
	//$("form").attr("method", "post");

	$("a.editar").click(function(){
		$("#titulo").html("Modificar mochila");
		$("form").attr("action", "../control/modificarMochila.php");
	});
});
