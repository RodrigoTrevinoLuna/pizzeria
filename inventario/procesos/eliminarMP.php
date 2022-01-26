<!doctype html>
<html lang="es">
  <head>
    <title>Editar MP Stock</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="bg-dark">
  <div class="container-fluid">
        <div class="row">
        <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom p-0">
          <a href="../MP-stock.php"><button class=" btn text-left"><img src="../../imagenes/regresar.png" style="height: 40px;"></button></a>
          </nav></div>
          <div class="col">
          <p class="text-light text-right">Sistema de Gestión Sucursal: Alas Pizzas</p>
        </div>
        </div>
      </div>
 <!--conexion a la base de datos-->
 <?php
                include('../../php/conexionBD.php');
                $id = $_GET["id"];
                $sql="SELECT * FROM mpstock,proveedor  WHERE idproducto='$id' AND mpstock.idProveedor = proveedor.idProveedor";
                $resultado = $conexion -> query($sql);

                $sqla="SELECT * from proveedor";
                $resultadoa = $conexion ->query($sqla);
            ?>


<!--Contenido del FORM-->
<div class="container-fluid">
    <div class="row">
    <div class="col"></div>
                <div class="col-lg-5 p-5">
                        <div class="col p-4 bg-light rounded">
                            
                                
                                <div class="col"><h1 class="text-center">Eliminar Inventario</h1></div>
                                
                            
                        <hr class="bg-dark">
                        
                                <form action="eliminar.php" method="POST">
                                <?php  while ($fila = mysqli_fetch_array($resultado)){ ?>
                                    <div class="list-group">
                                        <input type="hidden" name = "id" value="<?php  echo $fila["idProducto"];?>">
                                            <label>Nombre del Producto:<input class="col" type="text" name="producto" value="<?php echo $fila["producto"];?>" disabled></label>
                                            <label>Unidades:<input class="col" type="text" name="unidades"value="<?php echo $fila["unidades"];?>" disabled></label>
                                            <label>Precio de Compra:<input class="col" type="text" name="precioCompra" value="<?php echo $fila["precioCompra"];?>" disabled></label>
                                            <label>Cantidad Economica a surtir:<input class="col" type="text" name="minimas" value="<?php echo $fila["minimas"];?>" disabled></label>
                                            <label>Proveedor:<input class="col" type="text" name="idProveedor" value="<?php echo $fila["proveedor"];?>" disabled></label>
                                            
                                             
                                            
                                            
                                        <hr>
                                        <input class="btn btn-danger" type="submit" value="Eliminar">  </form>
                                        </div><?php  } ?>
                              
                        </div>
                </div>
                <div class="col"></div>
    </div>
                       
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>