<!doctype html>
<html lang="es">

<head>
  <title>Inicio</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--css personalizados-->
  <link rel="stylesheet" href="css/estilosPC.css">
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Estilos de la ventana css simple-->
  <style>
    html,
    body {
      height: 100%
    }

    a {
      color: white;
    }
  </style>
</head>

<body>
  
  <div class="container-fluid bg-dark">
    <div class="row">
    <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom p-0">
      <button class=" btn text-left" id="menu-toggle"><img src="imagenes/lista.png" style="height: 40px;"></button>
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
        <a href="#" class="list-group-item list-group-item-action bg-light">Panel de control</a>
        <button type="button" class=" list-group-item list-group-item-action bg-light" data-toggle="modal" data-target="#validacionAdmin">Usuarios</button>
        <button type="button" class=" list-group-item list-group-item-action bg-light" data-toggle="modal" data-target="#validacionadminProveedor">Proveedores</button>
        <button type="button" class=" list-group-item list-group-item-action bg-light" data-toggle="modal" data-target="#CerrarSesion">Cerrar Sesión</button>
        
      </div>
    </div>
<!--conexion a la base de datos-->
<?php
                include('php/conexionBD.php');
                
                $a="SELECT COUNT(*) as contara FROM mpstock";
                $consultaa = mysqli_query($conexion,$a);
                $arraya = mysqli_fetch_array($consultaa);


                $q="SELECT COUNT(*) as contar FROM mpstock WHERE (unidades < minimas)";
                $consulta = mysqli_query($conexion,$q);
                $array = mysqli_fetch_array($consulta);

                $b="SELECT COUNT(*) as contarb FROM menucomida";
                $consultab = mysqli_query($conexion,$b);
                $arrayb = mysqli_fetch_array($consultab);
            ?>
<!--Contenido-->
  <div class="container-fluid d-flex" id="page-content-wrapper">

   
    <div class="col">
      <h1 class="text-center">Panel de Control</h1>
      <hr style="background: black;">
      <div class="container-fluid">

        <div class="row">
          <div class="col-7 m-1 " id="cocina">
            <h5 class="container p-2 text-light " id="txtCocina">Inventario</h5>
            <div class="row text-center">
              <div class="col-lg-3 p-1"><a href="inventario/MP-stock.php" class="btn text-light"><img
                    src="imagenes/inventario.png">
                <p>Materia Prima en Stock</p>
                <?php if($arraya['contara']>0){?> 
                    <h2> <?php echo $arraya['contara'] ?> </h2>
                    <?php } else{ ?>
                      <h2><?php echo "0";?></h2>
                    <?php } ?>
                  </a>
              </div>
              <div class="col-lg-3 p-1"><a href="inventario/alerta-MP.php" class="btn text-light"><img
                    src="imagenes/alerta.png">
                <p>Alerta de Materia Prima Faltante</p>
                  <?php if($array['contar']>0){?> 
                    <h2> <?php echo $array['contar'] ?> </h2>
                    <?php } else{ ?>
                      <h2><?php echo "0";?></h2>
                    <?php } ?>
              </a>
              </div>
              <div class="col-lg-3 p-1"><a href="inventario/AbastMP.php" class="btn text-light"><img
                    src="imagenes/Abastecimientoinventario.png">
                <p>Abastecimiento de Materia Prima</p>
                <?php if($array['contar']>0){?> 
                    <h2> <?php echo $array['contar'] ?> </h2>
                    <?php } else{ ?>
                      <h2><?php echo "0";?></h2>
                    <?php } ?>
              </a>
              </div>
              <div class="col-lg-3 p-1"><a href="inventario/menuComida.php" class="btn text-light"><img
                src="imagenes/menu-comida.png">
            <p>Menú Comida</p><br>
            <?php if($arrayb['contarb']>0){?> 
                    <h2> <?php echo $arrayb['contarb'] ?> </h2>
                    <?php } else{ ?>
                      <h2><?php echo "0";?></h2>
                    <?php } ?>
                  </a>
          </div>
            </div>
          </div>
          <div class="col-lg-4 m-1 text-light bg-success">
            <h5 class="container p-2" id="inventario">Cocina</h5>
            <div class="row text-center">
              <div class="col m-2"><a href="Cocina/ordenesPedido.php" class="btn text-light"><img
                    src="imagenes/orden.png"><p>Ordenes de Pedido</p></a></div>
              <div class="col m-2"><a href="Cocina/movPedido.php" class="btn text-light"><img
                    src="imagenes/Movimiento.png"><br>Movimiento del Pedido</a></div>
            </div>
          </div>


          <div class="col-11 bg-primary m-2 text-light">
            <h5 class="container-fluid p-2" id="txtventa">Punto de Venta</h5>
            <div class="row text-center">
              <div class="col m-2 "><button type="button" class="btn text-light" data-toggle="modal" data-target="#validacionCaja"><img
                    src="imagenes/caja-de-efectivo.png"><br>Caja</button></div>
              <div class="col m-2"><a href="puntoVenta/ventaTotal.php" class="btn text-light"><img
                    src="imagenes/ventas-totales.png"><br>Ventas Totales</a></div>
            
              
            </div>
          </div>
        </div>
      </div>
      <footer class="card-footer text-right">
        <p class="card-footer">Build 0.0.1</p>
      </footer>

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

<!--Modal Validacion Usuario Caja-->
<div class="modal fade" id="validacionCaja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Clave de Acceso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="php/claveCaja.php" method="POST">
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

<!--Modal Validacion Cerrar Sesion-->
<div class="modal fade" id="CerrarSesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Estas seguro que desea cerrar sesión?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a href="php/cerrarSesion.php"><button type="button" class="btn btn-primary">Cerrar Sesión </button></a>
      </div>
    </div>
  </div>
</div>



      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
      <!-- Menu Toggle Script -->
      <script>
        $("#menu-toggle").click(function (e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });
      </script>
</body>

</html>