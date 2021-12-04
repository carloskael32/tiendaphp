<?php
require_once ("conexion/conexion.php");

$usuario = $_POST['usuario'];
$password = $_POST['pass'];

if ($usuario != "" && $password != "") {
    $user = null;
    $sql = "SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$password'";


    $query = $con->query($sql);

    while ($r = $query->fetch_array()) {
        $user = $r["id_usuario"];
        
    }

    if ($user == null) {
        print "<script>alert(\"Usuario no Registrado.\");window.location='../index.php';</script>";

    } else {

        session_start();
        $_SESSION["id_usuario"] = $user;
        print "<script>alert(\"Bienvenido... \");window.location='../principal.php';</script>";
    }
}
?>
