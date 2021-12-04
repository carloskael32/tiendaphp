<?php

require_once ("../conexion/conexion.php");

$ci = $_POST['ci'];
$nombres = $_POST['nombres'];
$apellidos =$_POST['apellidos'];
$password =$_POST['password'];
$n=0;

$sql = "INSERT INTO usuarios (nivel,ci,nombres,apellidos,pass) VALUES('$n','$ci','$nombres','$apellidos','$password')";
$resultado = $con->query($sql);

if($resultado){
    print "<script>alert(\"Empleado Registrado\");window.location='../../principal.php';</script>";
}else{
    print "<script>alert(\"Registro Fallido \");window.location='../../principal.php';</script>";
}
?>