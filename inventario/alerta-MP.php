<!doctype html>
<html lang="es">
  <head>
    <title>Alerta Materia Prima Faltante</title>
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
                $sql="SELECT * from mpstock WHERE (unidades < minimas)";
                $resultado = $conexion ->query($sql);
            ?>
    <!--Contenido-->
      <div class="container-fluid d-flex" id="page-content-wrapper">
        <div class="col">
            <h1 class="text-center">Alerta Materia Prima Faltante en Stock</h1>
            <hr style="background: black;">
          
            <div class="col table-wrapper-scroll-y my-custom-scrollbar">
              <table class="table table-striped text-center">
                <thead>
                  <tr class="text-light">
                    <th>Nombre del producto</th>
                    <th>Unidades / Porciones</th>
                    <th>Cantidad Económica a Surtir</th>
                    <th>Alerta</th>
                </tr>
                </thead>
                <tbody>
                  <tr >
                  <?php while ($fila = mysqli_fetch_array($resultado)){ ?>
                    <th> <?php  echo $fila["producto"];?> </th>
                    <th> <?php  echo $fila["unidades"];?> </th>
                    <th> <?php  echo $fila["minimas"];?> </th>
                    <th> Comprar </th>
                  </tr>
                  <?php } ?> <!--Cierre del while-->
                </tbody>
              </table>
            </div>
    
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
        <form action="php/usuario-alerta.php" method="POST">
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
        <form action="php/proveedor-alerta.php" method="POST">
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
    <!-- Menu Toggle Script -->
   
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