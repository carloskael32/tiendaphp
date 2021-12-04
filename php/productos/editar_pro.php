<?php
session_start();
require_once ("../conexion/conexion.php");

$id = $_REQUEST['id'];

$desc= $_POST['descripcion'];
$costo= $_POST['costo'];
$cantidad= $_POST['cantidad'];
$stock= $_POST['stock'];

		

			$sql ="UPDATE productos SET descripcion='$desc',costo_unitario='$costo',cantidad='$cantidad', stock_minimo='$stock' WHERE id_producto='$id'";

			$query =$con->query($sql);

			if($query!=null){
				print "<script>alert(\"Cambio Exitoso \");window.location='../../principal.php';</script>";

			}else{
				print"<script>alert(\"Error al cambiar\");window.location='../../editar_pro.php';</script>";
			}
?>