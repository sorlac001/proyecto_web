<?php
	include_once("../model/conexion.php");

	$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	$descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
	$id_marca = $_POST['id_marca'];
	$descuento = filter_var($_POST['descuento'], FILTER_SANITIZE_NUMBER_FLOAT);
	$tamano = filter_var($_POST['tamano'], FILTER_SANITIZE_STRING);
	$precio = filter_var($_POST['precio'], FILTER_SANITIZE_NUMBER_FLOAT);
	$cantidad = filter_var($_POST['cantidad'], FILTER_SANITIZE_NUMBER_FLOAT);
	$imagen = $_POST['imagen'];
	$id_mochila = $_POST['id_mochila'];

	if(!empty($id_mochila)){
		$mochila="UPDATE mochilas SET nombre = '$nombre', descripcion = '$descripcion', id_marca = '$id_marca', descuento = '$descuento', tamano = '$tamano', precio = '$precio', cantidad = '$cantidad', imagen = '$imagen' WHERE id_mochila = '$id_mochila'";
		
		vConsulta($mochila);

        header('Location: ../visual/gestionarMochilas.php');
	} else{
        header('Location: ../visual/gestionarMochilas.php');
	}
?>