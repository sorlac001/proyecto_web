<?php
	include_once("../model/conexion.php");

	$id_marca=$_GET["marca"];

	if(!empty($id_marca)){

		$marcaMochila="UPDATE mochilas SET id_marca = 6 WHERE id_marca = '$id_marca'";
		aConsulta($marcaMochila);

		$marca="DELETE FROM marcas WHERE id_marca=$id_marca";
		aConsulta($marca);

        header('Location:../visual/gestionarMarcas.php');
	} else{
        header('Location:../visual/gestionarMarcas.php');
	}
?>