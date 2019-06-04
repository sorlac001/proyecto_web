<?php
	include_once("../model/conexion.php");

	$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	$ap_paterno = filter_var($_POST['aPaterno'], FILTER_SANITIZE_STRING);
	$ap_materno = filter_var($_POST['aMaterno'], FILTER_SANITIZE_STRING);
	$telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING, [0-9]);
	$correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
	$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
	$id_tipo_usuario = filter_var($_POST['tipoUsuario'], FILTER_SANITIZE_STRING);
	$id_usuario = $_POST['id_usuario'];

	if(!empty($id_usuario)){
		$usuario="UPDATE usuarios SET nombre = '$nombre', ap_paterno = '$ap_paterno', ap_materno = '$ap_materno', telefono = '$telefono', correo = '$correo', usuario = '$usuario', id_tipo_usuario = '$id_tipo_usuario'WHERE id_usuario = '$id_usuario'";
		
		aConsulta($usuario);

        header('Location: ../visual/gestionarUsuarios.php');
	} else{
        header('Location: ../visual/gestionarUsuarios.php');
	}
?>