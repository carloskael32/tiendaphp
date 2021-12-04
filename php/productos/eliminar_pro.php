<?php
require_once ("../conexion/conexion.php");
session_start();
$sesion = $_SESSION["id_usuario"];


	$id = $_REQUEST['id'];
	

	$sql = "DELETE FROM productos WHERE id_producto = '$id'";
    $resultado = $con->query($sql);
    



	if($resultado){

			header("Location: ../../principal.php");

		}else{
			echo "Error al Eliminar";
			header("Location: ../../principal.php");	
		}



		


?>


