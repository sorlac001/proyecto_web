<?php
include_once("../model/conexion.php");

$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);

if(!empty($nombre)){
        $marca = "INSERT INTO marcas (nombre) VALUES('$nombre')";
        $guarda_marca = aConsulta($marca);
        if($guarda_marca == false){
               	header('Location:../visual/gestionarMarcas.php');
        } else {
                header('Location:../visual/gestionarMarcas.php');
        }
} else{
    header('Location:../visual/gestionarMarcas.php');
}
?>