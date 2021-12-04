<?php
session_start();
?>


<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="estilos/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="estilos/estilos.css" type="text/css">

</head>

<body>

  <div class="py-5 text-center">
    <div class="container ">
      <div class="row">
        <div class="col-lg-5 col-10 py-3 rounded mx-auto border border-info" style="">
          <h1>Modificar Datos</h1>

          <?php
          require_once("php/conexion/conexion.php");
          $id = $_REQUEST['id'];
          $sql = "SELECT * FROM productos WHERE id_producto = $id";
          $query = $con->query($sql);
          $row = $query->fetch_array();

          ?>



          <form class="text-left" name="modificar" action="php/productos/editar_pro.php?id=<?php echo $row['id_producto']; ?>" method="post" enctype="multipart/form-data">

            <div class="form-group"> <label for="form16">Descripcion</label> <input type="text" class="form-control"  name="descripcion" value="<?php echo $row['descripcion']; ?>"> </div>

            <div class="form-group"> <label for="form17">costo unitario</label> <input type="text" class="form-control"  name="costo" value="<?php echo $row['costo_unitario']; ?>"> </div>

            <div class="form-group"> <label for="form18">cantidad</label> <input type="text" class="form-control"  name="cantidad" value="<?php echo $row['cantidad']; ?>"> </div>

            <div class="form-group"> <label for="form18">Stock minimo</label> <input type="text" class="form-control"  name="stock" value="<?php echo $row['stock_minimo']; ?>"> </div>


            



            <div align="center">
              <button type="submit" class="btn btn-success">Cambiar</button>
              
              <a class="btn btn-primary" href="principal.php">Volver</a>
            </div>









            <div>&nbsp;</div>

          </form>

        </div>
      </div>
    </div>
  </div>





</body>

</html>