<?php
//establecen la conexión al manejador de bases de datos:
function aConsulta($consulta){
    $con = pg_connect("host=127.0.0.1 port=5432 dbname=proyecto_web user=administrador password=12Admin34") or die("No se puede establecer conexion a la BD");
    $query = pg_query($con,$consulta);
    $resp = pg_fetch_all($query);
    return $resp;
}
function vConsulta($consulta){
    $con = pg_connect("host=127.0.0.1 port=5432 dbname=proyecto_web user=vendedor password=34Vendedor12") or die("No se puede establecer conexion a la BD");
    $query = pg_query($con,$consulta);
    $resp = pg_fetch_all($query);
    return $resp;
}
function cConsulta($consulta){
    $con = pg_connect("host=127.0.0.1 port=5432 dbname=proyecto_web user=cliente password=43Cliente21") or die("No se puede establecer conexion a la BD");
    $query = pg_query($con,$consulta);
    $resp = pg_fetch_all($query);
    return $resp;
}

function aConectar(){
	$con = pg_connect("host=127.0.0.1 port=5432 dbname=proyecto_web user=administrador password=12Admin34");
	return $con;
}
function vConectar(){
	$con = pg_connect("host=127.0.0.1 port=5432 dbname=proyecto_web user=vendedor password=34Vendedor12");
	return $con;
}
function cConectar(){
	$con = pg_connect("host=127.0.0.1 port=5432 dbname=proyecto_web user=cliente password=43Cliente21");
	return $con;
}
?>
