<?php
include_once("../model/conexion.php");

$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$aPaterno = filter_var($_POST['aPaterno'], FILTER_SANITIZE_STRING);
$aMaterno = filter_var($_POST['aMaterno'], FILTER_SANITIZE_STRING);
$telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
$correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
$contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);
$tipoUsuario = $_POST['tipoUsuario'];

if(!empty($nombre)||!empty($aPaterno)||!empty($telefono)||!empty($correo)||!empty($usuario)||!empty($contrasena)||!empty($tipoUsuario)){
        $usuario = "INSERT INTO usuarios (nombre,ap_paterno,ap_materno,telefono,correo,usuario,contrasena,id_tipo_usuario) VALUES('$nombre', '$aPaterno', '$aMaterno', '$telefono', '$correo', '$usuario', '$contrasena', '$tipoUsuario')";
        $guarda_usuario = aConsulta($usuario);
        if($guarda_usuario == false){
               	header('Location:../visual/gestionarUsuarios.php');
        } else {
                header('Location:../visual/gestionarUsuarios.php');
        }
} else{
        header('Location:../visual/gestionarUsuarios.php');
}
?>
