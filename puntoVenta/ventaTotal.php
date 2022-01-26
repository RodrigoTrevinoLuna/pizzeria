<!doctype html>
<html lang="es">
  <head>
    <title>Ventas Totales</title>
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
                $sql="SELECT * from caja";
                $resultado = $conexion ->query($sql);
            ?>
<!--Contenido-->
<div class="container-fluid d-flex" id="page-content-wrapper">
    <div class="col">
        
        <h1 class="text-center">Ventas Totales</h1>
        <hr style="background: black;">
        <form action="ventaTotal.php" method="POST">
                <div class="row">
                    <div class="col-7"></div>
                    <div class="col-3">
                          <label class="text-dark">Fecha: <input type="date" name="fecha"></label>
                        </div>
                        <div class="col"><button class="btn btn-primary">Filtrar</button></div>
                  </div> 
          </form>
<hr>
<div class="text-right p-2">
    <label>Buscar: <input type="text" id="search"></label> <!--Buscar elementos en la tabla-->
  </div>

    <!--Tabla-->                                
    
        <div class="col">
            <table class="table table-striped text-center" id="mytable">
                <thead class="text-light">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Venta total</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <!--conexion a la base de datos-->
    <?php 
          if(isset( $_POST['fecha'])){

            
              $fecha = $_POST['fecha'];
              $sqlFecha="SELECT * from ventas,productos_vendidos,menucomida WHERE fecha LIKE ('%$fecha%') AND ventas.id = productos_vendidos.id_venta AND productos_vendidos.idComida = menucomida.idComida ";
              $resultadoFecha = $conexion ->query($sqlFecha);
              
            ?>
                <tbody>
                <?php while ($fila = mysqli_fetch_array($resultadoFecha)){ ?>
                    <tr>
                        <td> <?php echo $fila["comida"]; ?> </td>
                        <td> <?php echo $fila["cantidad"]; ?> </td>
                        <td> <?php echo $fila["total"]; ?> </td>
                        <td> <?php echo $fila["fecha"]; ?> </td>
                    </tr>
                    <?php } ?> <!--Cierre del while-->
                </tbody>
            </table>
            
        </div>
   
                 <?php }?>

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
        <form action="php/claveadmin.php" method="POST">
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
        <form action="php/adminproveedor.php" method="POST">
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
        // Write on keyup event of keyword input element
                $(document).ready(function(){
                $("#search").keyup(function(){
                _this = this;
                // Show only matching TR, hide rest of them
                $.each($("#mytable tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                $(this).hide();
                
                else
                $(this).show();
                
                });
                });
                });
      </script>
     
  </body>
</html>