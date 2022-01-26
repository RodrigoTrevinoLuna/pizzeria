<!doctype html>
<html lang="es">
  <head>
    <title>Abastecimiento Materia Prima</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--css personalizados-->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid bg-dark">
      <div class="row">
      <div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom p-0">
        <button class=" btn text-left" id="menu-toggle"><img src="../imagenes/lista.png" style="height: 40px;"></button>
        </nav></div>
        <div class="col">
        <p class="text-light text-right">Sistema de Gestión Sucursal: Alas Pizzas</p>
      </div>
      </div>
    </div>

  <div class="d-flex toggled" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Menú</div>
      <div class="list-group list-group-flush">
        <a href="../inicio.php" class="list-group-item list-group-item-action bg-light">Panel de control</a>
        <button type="button" class=" list-group-item list-group-item-action bg-light" data-toggle="modal" data-target="#validacionAdmin">Usuarios</button>
            <button type="button" class=" list-group-item list-group-item-action bg-light" data-toggle="modal" data-target="#validacionadminProveedor">Proveedores</button>
      </div>
    </div>

<!--conexion a la base de datos-->
<?php
                include('../php/conexionBD.php');
                $sql="SELECT * from mpstock, proveedor WHERE (unidades<minimas) AND mpstock.idProveedor = proveedor.idProveedor;";
                $resultado = $conexion ->query($sql);

                $sqla = "SELECT * from proveedor";
                $a = $conexion ->query($sqla);
            ?>


<!--Contenido-->
  <div class="container-fluid d-flex" id="page-content-wrapper">
    
    <div class="col ">
        <h1 class="text-center">Abastecimiento de Materia Prima</h1>
        <hr style="background: black;">

      <div class="col table-wrapper-scroll-y my-custom-scrollbar">
        
        <table class="table table-bordered text-center">
          <thead class="text-light">
            <tr>
              <th>Producto</th>
              <th>Unidades en Stock</th>
              <th>Minimo Requerido en Stock</th>
              <th>Cantidad a Pedir</th>
              <th>Proveedor</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $prueba = array();
          $n=0;
          while ($fila = mysqli_fetch_array($resultado)){ 
            $prueba[] = array($fila);
            $n++;
            ?>  

          <tr>
            <input type="hidden" name="producto" value="<?php  echo $fila["producto"];?>">
            <input type="hidden" name="proveedor" value="<?php  echo $fila["proveedor"];?>">
            <input type="hidden" name="telefono" value="<?php  echo $fila["telefono"];?>">
            <input type="hidden" name="correo" value="<?php  echo $fila["correo"];?>">
            <input type="hidden" name="direccion" value="<?php  echo $fila["direccion"];?>">
            
              <td> <?php  echo $fila["producto"];?> </td>
              <td> <?php  echo $fila["unidades"];?> </td>
              <td> <?php  echo $fila["minimas"];?>  </td>
              <td> <input class="text-center" type="number" value="<?php echo $fila["minimas"] - $fila["unidades"];?>" min="1" name ="pedido" required></td>
              <td> <?php  echo $fila["proveedor"];?> </td>
              
                
            </tr>
            <?php }?> <!--Cierre del while-->
          </tbody>
        </table>
        
      
      </div>
      <form action="procesos/pdf.php">

      <div class="row">
        <div class="col-8"></div>
        <div class="col-4"><label>Generar Lista de Pedido: <input class="btn btn-danger"  type="submit" value="Generar"></label></div>
      
    </div>
</form>





  </div>    
  </div>
</div>



<!--Modal Validacion Usuario Administrador-->
<div class="modal fade" id="validacionAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Clave de Acceso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="php/usuario-abast.php" method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Clave:</label>
            <input type="text" class="form-control" id="txtContra" name="clave">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ingresar</button></form>
      </div>
    </div>
  </div>
</div>

<!--Modal Validacion Usuario admin Proveedores-->
<div class="modal fade" id="validacionadminProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Clave de Acceso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="php/proveedor-abast.php" method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Clave:</label>
            <input type="text" class="form-control" id="txtContra" name="clave">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Ingresar</button></form>
      </div>
    </div>
  </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    
  </body>
</html>