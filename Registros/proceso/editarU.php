<!doctype html>
<html lang="es">
  <head>
    <title>Editar Usuario</title>
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
          <a href="../usuario.php"><button class=" btn text-left"><img src="../../imagenes/regresar.png" style="height: 40px;"></button></a>
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
                $sql="SELECT * from usuario WHERE idUsuario = '$id'";
                $resultado = $conexion -> query($sql);
            ?>
            
<!--Contenido del FORM-->
    <div class="container-fluid">
    <div class="row">
    <div class="col"></div>
                <div class="col-lg-5 p-5">
                        <div class="col p-4 bg-light rounded">
                            <div class="row">
                                <div class="col-lg-3"><img src="../../imagenes/pizza.png" style="width: 70px;"></div>
                                <div class="col-lg-6"><h1 class="text-center">Editar Usuario</h1></div>
                                <div class="col-lg-3"><img src="../../imagenes/pizza.png" style="width: 70px;"></div>
                            </div>
                        <hr class="bg-dark">
                                <form action="editarBD.php" method="POST">
                                    <?php  while ($fila = mysqli_fetch_array($resultado)){ ?>
                                    <div class="list-group">
                                        <input type="hidden" name = "id" value="<?php  echo $fila["idUsuario"];?>">
                                            <label>Nombre:<input class="col" type="text" name="nombre" value="<?php echo $fila["nombre"];?>"></label>
                                            <label>Usuario:<input class="col" type="text" name="usuarios"value="<?php echo $fila["usuarios"];?>"></label>
                                            <label>Password:<input class="col" type="text" name="passwords" value="<?php echo $fila["password"];?>"></label>
                                            <label>Nivel de Acceso: </label>
                                                <select name="nivelAcceso">
                                                    <option value="<?php echo $fila["nivelAcceso"];?>"> <?php echo $fila["nivelAcceso"];?> </option>
                                                    <option value="Empleado">Empleado</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Caja">Caja</option>
                                                </select>
                                        
                                        <hr>
                                        <input class="btn btn-danger" type="submit" value="Guardar">  </form>
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