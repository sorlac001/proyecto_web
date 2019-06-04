<?php 
	session_start();
	$tipo_usuario = $_SESSION['tipo_usuario'];
    $id_usuario = $_SESSION['id_usuario'];
	header('Location:visual/inicio.php');
?>