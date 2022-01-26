<!doctype html>
<html lang="es">
  <head>
    <title>Pedidos a Domicilio</title>
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
            <a href="../Registros/usuario.php" class="list-group-item list-group-item-action bg-light">Usuarios</a>
            <a href="../Registros/proveedores.php" class="list-group-item list-group-item-action bg-light">Proveedores</a>
          </div>
        </div>
    

        <!--conexion a la base de datos-->
              <?php
                include('../php/conexionBD.php');
                $fechaActual = date('Y-m-d');
                
                
                $sql="SELECT * from pedidodomicilio, caja WHERE Fecha LIKE ('%$fechaActual%')";
                $resultado = $conexion ->query($sql);

              ?>
    <!--Contenido-->
      <div class="container-fluid" id="page-content-wrapper">
          <div class="col">
            <h1 class="text-center">Pedidos a Domicilio Hoy</h1>
          </div>
<hr style="background: black;">
          <div class="text-right p-2">
            <label>Buscar: <input type="text" id="search"></label> <!--Buscar elementos en la tabla-->
          </div>
            <div class="col table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-striped text-center" id="mytable">
                    <thead>
                        <tr class="text-light">
                            <th>Nombre del cliente</th>
                            <th>No. Pedido</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                        </tr>
                    </thead>
                      <?php while ($fila = mysqli_fetch_array($resultado)){ ?>
                        <tr>
                            <td> <?php  echo $fila["nombreCliente"]; ?>   </td>
                            <td> <?php  echo $fila["idPedido"];      ?>   </td>
                            <td> <?php  echo $fila["telefono"];      ?>   </td>
                            <td> <?php  echo $fila["direccion"];     ?>   </td>
                        </tr>
                        <?php } ?> <!--Cierre del while-->
                    <tbody>
    
                        
                    </tbody>
                </table>
            </div>
        
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Menu Toggle Script -->
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