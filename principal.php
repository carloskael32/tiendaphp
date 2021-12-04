<?php
session_start();
error_reporting(0);
$sesion = $_SESSION["id_usuario"];
if ($sesion == null || $sesion = '') {

  print "<script>alert(\"Acceso Denegado\");window.location='index.php';</script>";


  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="estilos/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="estilos/estilos.css" type="text/css">

  <title>Principal</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bgnav">


    <div>

      <img src="estilos/carrito.png" width="70" height="70" class="d-inline-block align-top" alt=""> &nbsp;

    </div>

    <div>

      <h4><b>Sistema de Ventas</b></h4>

    </div>


    <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>
    <div class="container col-6">
      <div class="collapse navbar-collapse" id="navbarNav">








        <?php
        $nivel = $_REQUEST['no'];

        if ($nivel == 1) {
          echo '<a type="button" class="col  border-dark btn btn-dark bgbtn  btn-sm" data-toggle="modal" data-target="#empleados">∘ Registrar Empleados</a>';
          echo '<a type="button" class="col btn btn-danger  btn-sm" href="php/logout.php">∘ Cerrar Sesion</a>';
        } else {

          echo '<a type="button" class="col  border-dark btn btn-dark bgbtn  btn-sm" data-toggle="modal" data-target="#productos">∘ Agregar Productos</a>';
          echo '<a type="button" class="col btn btn-danger  btn-sm" href="php/logout.php">∘ Cerrar Sesion</a>';
        }
        ?>

      </div>
    </div>
  </nav>

  <div class="container col-9">
    <div class="row">
      
    

   
    <p><b>
    
            <h3 class="txt">Listado de Productos</h3>
          </b></p>

        <table class="txt table table-striped">
          <thead>


            <tr>

              <th scope="col">Descripcion</th>

              <th scope="col">Costo_unitario</th>

              <th scope="col">Cantidad</th>

              <th scope="col">Stock_minimo</th>

              <th scope="col">Acciones</th>

            </tr>

          </thead>

          <?php
          require_once("php/conexion/conexion.php");
          $consulta = "SELECT * FROM productos ";
          $query = $con->query($consulta);

          while ($row = $query->fetch_assoc()) {
            ?>

            <tbody>
              <tr>


                
                <td><?php echo $row['descripcion']; ?></td>
                <td><?php echo $row['costo_unitario']; ?></td>
                <td><?php echo $row['cantidad']; ?></td>
                <td><?php echo $row['stock_minimo']; ?></td>

                


                <td><a class="btn btn-danger" href="php/productos/eliminar_pro.php?id=<?php echo $row['id_producto']; ?>">Emilinar</a></td>
                <td><a class="btn btn-warning" href="editar_pro.php?id=<?php echo $row['id_producto']; ?>">Modificar</a></td>

              </tr>


            </tbody>

          <?php
          }
          ?>


      

      </table>




    </div>

  </div>
  </div>



  <!-- MODAL AGREGAR PRODUCTOS-->
  <div class="modal fade" id="productos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class=" modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            Ingrese los Datos del Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color:red;">&times;</span>
          </button>
        </div>
        <div class=" modal-body">

          <form style="color:blue;" action="php/productos/insertar_pro.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label >Descripcion</label>
              <input type="text" class="form-control" name="descripcion" placeholder="Descripcion " required>
              
            </div>

            <div>
              <label>Costo unitario</label>
              <input type="number" class="form-control" name="costo" placeholder="costo unitario" required>
              
            </div>
            <div>
              <label>Cantidad</label>
              <input type="number" class="form-control" name="cantidad" placeholder="cantidad" required>
              
            </div>
            <div>
              <label>Stock minimo</label>
              <input type="number" class="form-control" name="stock" placeholder="stock minimo" required>
              
            </div>
            <div>
              <label>Id Usuario</label>
              <input type="number" class="form-control" name="id" placeholder="id usuario" required>
              
            </div>
        
            <br>

            <button type="submit" class="btn btn-success float-right">Registrar</button>
          </form>

        </div>

      </div>
    </div>
  </div>



  <!-- MODAL AGREGAR EMPLEADOS-->
  <div class="modal fade" id="empleados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class=" modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            Ingrese datos del Empleado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color:red;">&times;</span>
          </button>
        </div>
        <div class=" modal-body">

          <form style="color:blue;" action="php/usuarios/insertar_em.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">Carnet de Identidad (CI)</label>
              <input type="number" class="form-control" name="ci" placeholder="Eje. 87459612 " required>
              <!--<small id="emailHelp" class="form-text text-muted"></small>-->
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nombres</label>
              <input type="text" class="form-control" name="nombres" placeholder="Eje. Juan Luis" required>
              <!--<small id="emailHelp" class="form-text text-muted"></small>-->
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Apellidos</label>
              <input type="text" class="form-control" name="apellidos" placeholder="Eje. Perez Ali" required>
              <!--<small id="emailHelp" class="form-text text-muted"></small>-->
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Contraseña</label>
              <input type="password" class="form-control" name="password" placeholder="*****" required>
              <!--<small id="emailHelp" class="form-text text-muted"></small>-->
            </div>




            <button type="submit" class="btn btn-success float-right">Registrar</button>
          </form>

        </div>

      </div>
    </div>
  </div>





  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>