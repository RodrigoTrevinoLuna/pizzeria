<!doctype html>
<html lang="es">
  <head>
    <title>Ordenes de Pedido</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
      <div><h1 class="text-center">Ordenes de Pedido</h1>
        <hr style="background: black;"></div>
    </div>


    <!--conexion a la base de datos-->
    <?php
                include('../php/conexionBD.php');
                $fechaActual = date('Y-m-d');
                
                
                
                $sql="SELECT * From menucomida, productos_vendidos,ventas where productos_vendidos.idComida = menucomida.idComida and ventas.id = productos_vendidos.id_venta and fecha LIKE ('%$fechaActual%')";
                $resultado = $conexion ->query($sql);

              ?>
        <!--Cuerpo de la pagina-->
<div class="container-fluid">
<div class="row text-light text-center">
    <!--Inicio del cuadro de pedido-->
    
    <?php while ($fila = mysqli_fetch_array($resultado)){ ?>
    <div class="col-lg-4">
        <div class="container bg-secondary m-2 rounded">
             
                <!--Titulo del pedido-->
            <div class="col text-center"><h5 class="p-3">Pedido #<?php echo $fila["id"]; ?></h5></div>
            
            <!--Descripcion del pedido-->
           <form action="php/guardarEstatusP.php" method="post">
            <div class="col">
                <table class="table table-striped">
                    <thead class="bg-dark text-light">
                        <tr>
                           <td>Producto</td> 
                           <td>Tamaño</td> 
                        </tr>
                    </thead>
                   
                    <tbody class="text-dark bg-light">
                    
                        <tr>
                            <input type="hidden" value="<?php echo $fila["comida"];?>" name="comida">
                            <input type="hidden" value="<?php echo $fila["idPV"];?>" name="idPV">
                            <input type="hidden" value="<?php echo $fila["tamaño"];?>" name="tamano">
                            <td> <?php echo $fila["comida"]; ?> </td>
                            <td> <?php echo $fila["tamaño"]; ?> </td>
                        </tr>
                         
                    </tbody>
                </table>
                <div class="col">
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-3 p-3"><button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#estatus">Entregado</button></div>
                </div>
                </div>
            </div></form>
  


            
            
        </div>
    </div> 
<?php } ?> <!--Cierre del while-->
    </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>