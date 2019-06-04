<?php
	include_once("../model/conexion.php");

	$id_mochila=$_GET["mochila"];

	if(!empty($id_mochila)){

		$mochila="DELETE FROM mochilas WHERE id_mochila=$id_mochila";
		vConsulta($mochila);

        header('Location:../visual/gestionarMochilas.php');
	} else{
        header('Location:../visual/gestionarMochilas.php');
	}
?>