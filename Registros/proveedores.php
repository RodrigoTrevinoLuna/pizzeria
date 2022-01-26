<!doctype html>
<html lang="es">
  <head>
    <title>Proveedores</title>
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
          <a href="../inicio.php"><button class=" btn text-left"><img src="../imagenes/casa-web.png" style="height: 40px;"></button></a>
          </nav></div>
          <div class="col">
          <p class="text-light text-right">Sistema de Gestión Sucursal: Alas Pizzas</p>
        </div>
        </div>
      </div>

      <div class="container-fluid">
        <h1 class="text-center ">Proveedores</h1>
        <hr class="bg-dark">
      </div>

      <div class="container-fluid">
        <div class="row" >
            <div class="col-lg-3">
                <div class="col bg-secondary p-2 my-custom-scrollbar">
                <h3 class="text-center text-light">Ingresar</h3>
                <hr class="bg-light">
                <div class="col p-2">
                    <form action="RegistroProveedor.php" method="POST">
                        <div class="list-group text-light">
                            <label>Nombre: <input type="text" class="col" placeholder="Proveedor" name="proveedor" required></label>
                            <label>Telefono: <input type="tel" class="col" placeholder="Telefono" name="telefono" required></label>
                            <label>Correo: <input type="text" class="col" placeholder="Correo" name="correo"></label>
                            <label>Direccíon: <input type="text" class="col" placeholder="Dirección" name="direccion"></label>
                            <div class="col p-2"><button type="submit" class="btn btn-danger col">Guardar</button></div>
                        </div>
                    </form>
                </div>
            </div></div>
        <!--conexion a la base de datos-->
            <?php
                include('../php/conexionBD.php');
                $sql="SELECT * from proveedor";
                $resultado = $conexion ->query($sql);
            ?>
            <div class="col text-center">
            <div class="col bg-secondary">
                <div class="col">
                    <div class=" table-wrapper-scroll-y my-custom-scrollbar">
                        <table class=" p-2 table table-striped">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Dirección</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody class="bg-light">
                                <tr>
                                <?php while ($fila = mysqli_fetch_array($resultado)){ ?>
                                    <td> <?php echo $fila["proveedor"]; ?> </td>
                                    <td> <?php echo $fila["telefono"]; ?> </td>
                                    <td> <?php echo $fila["correo"]; ?> </td>
                                    <td> <?php echo $fila["direccion"]; ?> </td>
                                    <td>                
                                            <a href="proceso/editarP.php?id=<?php  echo $fila["idProveedor"];?>"><button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Editar Proveedor"><img  src="../imagenes/editar.png"></button></a>  
                                            <a href="proceso/eliminarP.php?id=<?php  echo $fila["idProveedor"];?>" ><button type="button" class="btn" data-toggle="modal" data-placement="top" title="Eliminar Proveedor" data-target="#borrarCliente"><img  src="../imagenes/borrar.png"></button></a>
                                          </td>
                                </tr>
                                <?php } ?> <!--Cierre del while-->
                            </tbody>
                        </table>
                    </div>
                </div></div>
            </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>