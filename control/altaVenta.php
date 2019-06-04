<?php
    session_start();

    $datos=$_SESSION['carrito'];
/*
    $numero=$datos['Cantidad'];
    $id_mochila=$datos['Mochila'];
*/
    include_once("../model/conexion.php");

    $fecha = date("Y-m-d");
    $precio_unitario = $_POST['precio_unitario'];
    $id_usuario = $_POST['id_usuario'];
    $id_forma_pago = $_POST['id_forma_pago'];
    $id_tipo_envio = $_POST['id_tipo_envio'];

    if(!empty($fecha)||!empty($precio_unitario)||!empty($id_usuario)||!empty($id_forma_pago)||!empty($id_tipo_envio)){
            $venta = "INSERT INTO ventas(fecha, precio_unitario, id_usuario, id_tipo_envio, id_forma_pago) VALUES('$fecha','$precio_unitario','$id_usuario', '$id_forma_pago', '$id_tipo_envio')";
            $guarda_venta = cConsulta($venta);
/*
            $vCon = vConectar();
            $query=("SELECT cantidad FROM mochilas");
            $res=pg_query($vCon,$query);
            $f=pg_fetch_array($res);

            $cantidad=$f['cantidad'] - $numero;
            $mochila="UPDATE mochilas SET cantidad = '$cantidad' WHERE id_mochila = '$id_mochila'";
        
            vConsulta($mochila);
*/
            if($guarda_venta == false){
                    header('Location:../visual/compras.php');
            } else {
                    header('Location:../visual/compras.php');
            }
    } else{
            header('Location:../visual/compras.php');
    }
?>