<?php
    include_once("../model/conexion.php");

    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
    $descuento = filter_var($_POST['descuento'], FILTER_SANITIZE_STRING, [0-9]);
    $tamano = $_POST['tamano'];
    $precio = filter_var($_POST['precio'], FILTER_SANITIZE_STRING, [0-9]);
    $cantidad = $_POST['cantidad'];
    $imagen = $_POST['imagen'];
    $id_marca = $_POST['id_marca'];

    if(!empty($nombre)||!empty($descripcion)||!empty($descuento)||!empty($tamano)||!empty($precio)||!empty($cantidad)||!empty($imagen)||!empty($id_marca)){
            $marca = "insert into mochilas (nombre,descripcion,descuento,tamano,precio,cantidad,imagen,id_marca) values('$nombre','$descripcion','$descuento', '$tamano', '$precio', '$cantidad', '$imagen', '$id_marca')";
            $guarda_marca = vConsulta($marca);
            if($guarda_marca == false){
                    header('Location:../visual/gestionarMochilas.php');
            } else {
                    header('Location:../visual/gestionarMochilas.php');
            }
    } else{
            header('Location:../visual/gestionarMochilas.php');
    }
?>