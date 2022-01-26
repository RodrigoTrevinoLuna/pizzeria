<!doctype html>
<html lang="es">
  <head>
    <title>Movimiento del Pedido</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--css personalizados-->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
      
    <div class="container-fluid bg-dark p-2">
        <div class="row">
            <div class="col"> <a href="../inicio.php"><button class=" btn text-left bg-light"><img src="../imagenes/casa-web.png" style="height: 35px; width: 35px;"></button></a></div>
        <div class="col">
            <p class="text-light text-right">Sistema de Gestión Sucursal: Alas Pizzas</p>
          </div>
      </div></div>
    <div class="container-fluid">
        <!--Titulo de la pagina-->
    <div><h1 class="text-center">Movimiento del pedido</h1>
      <hr style="background: black;"></div>
  </div>
  <?php
                include('../php/conexionBD.php');
                $sql="SELECT * from estatuspedido, productos_vendidos,ventas WHERE productos_vendidos.idPV = estatuspedido.idProducto_vendidos and (ventas.id = productos_vendidos.id_venta) ";
                $resultado = $conexion ->query($sql);
            ?>
        <!--Cuerpo de la pagina-->
<div class="container-fluid">
<div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-striped text-center" id="mytable">
            <thead>
                <tr class="text-light">
                    <th>#Pedido</th>
                    <th>Comida</th>
                    <th>Tamaño</th>
                    <th>Fecha</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($fila = mysqli_fetch_array($resultado)){ ?>
                <tr>
                <td><?php  echo $fila["id"];?> </td>
                    <td><?php  echo $fila["comida"];?> </td>
            
                    <td> <?php  echo $fila["tamano"];?>  </td>
                    <td> <?php  echo $fila["fecha"];?>  </td>
                    <td> Entregado </td>
                </tr>
                <?php } ?> <!--Cierre del while-->

            </tbody>
        </table>
</div></div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>