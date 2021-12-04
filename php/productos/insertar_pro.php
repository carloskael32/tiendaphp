<?php

require_once ("../conexion/conexion.php");

$descripcion = $_POST['descripcion'];
$costo = $_POST['costo'];
$cantidad = $_POST['cantidad'];
$stock = $_POST['stock'];
$id_user = $_POST['id'];


$sql = "INSERT INTO productos (descripcion,costo_unitario,cantidad,stock_minimo,id_usuario1) VALUES('$descripcion','$costo','$cantidad','$stock','$id_user')";
$resultado = $con->query($sql);

if($resultado){
    print "<script>alert(\"Producto Registrado\");window.location='../../principal.php';</script>";
}else{
    print "<script>alert(\"Registro Fallido \");window.location='../../principal.php';</script>";
}
?>