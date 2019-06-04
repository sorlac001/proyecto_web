<?php
	include_once("../model/conexion.php");

	$id_usuario=$_GET["usuario"];

	if(!empty($id_usuario)){

		$usuario="DELETE FROM usuarios WHERE id_usuario=$id_usuario";
		aConsulta($usuario);

        header('Location:../visual/gestionarUsuarios.php');
	} else{
        header('Location:../visual/gestionarUsuarios.php');
	}
?>