<!doctype html>
<html lang="es">
  <head>
    <title>Usuarios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!--css personalizados-->
     <link href="../css/simple-sidebar.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body >
      
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
        <h1 class="text-center ">Usuarios</h1>
        <hr class="bg-dark">
      </div>

    <!--Contenido-->
    <div class="container-fluid">
        <div class="row" >
            <div class="col-lg-3">
                <div class="col bg-secondary p-2 my-custom-scrollbar">
                <h3 class="text-center text-light">Ingresar</h3>
                <hr class="bg-light">
                <div class="col p-2">
                    <form action="registro.php" method="POST">
                        <div class="list-group text-light">
                            <label>Nombre: <input type="text" class="col" placeholder="Empleado" name="nombre" required></label>
                            <label>Usuario: <input type="text" class="col" placeholder="Usuario" name="usuario" required></label>
                            <label>Password: <input type="password" class="col" placeholder="Password" name="password" required></label>
                            <label>Nivel de Acceso: </label><select name="nivelAcceso" required>
                                <option value="" selected  hidden disabled>Seleccione Uno:</option>
                                <option value="Empleado">Empleado</option>
                                <option value="Admin">Admin</option>
                                <option value="Caja">Caja</option>
                            </select>
                            <hr>
                            <div class="col p-2"><button type="submit" class="btn btn-danger col">Guardar</button></div>
                        </div>
                    </form>
                </div>
            </div></div>

            <!--conexion a la base de datos-->
            <?php
                include('../php/conexionBD.php');
                $sql="SELECT * from usuario";
                $resultado = $conexion ->query($sql);
            ?>
            <div class="col text-center">
            <div class="col bg-secondary">
                <div class="col">
                    <div class=" table-wrapper-scroll-y my-custom-scrollbar">
                        <table class=" p-2 table table-striped text-light">
                            <thead><tr>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Nivel de Acceso</th>
                                <th>Opción</th>
                            </tr>
                        </thead>
                            <tbody class="bg-light text-dark">
                                
                                <tr>
                                   <?php while ($fila = mysqli_fetch_array($resultado)){ ?>
                                        
                                        <td> <?php  echo $fila["nombre"];?> </td>
                                        <td> <?php  echo $fila["usuarios"];?> </td>
                                        <td> <?php  echo $fila["password"];?> </td>
                                        <td> <?php  echo $fila["nivelAcceso"];?> </td>
                                        <td>                
                                            <a href="proceso/editarU.php?id=<?php  echo $fila["idUsuario"];?>"><button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Editar Cliente"><img  src="../imagenes/editar.png"></button></a>  
                                            <a href="proceso/eliminarU.php?id=<?php  echo $fila["idUsuario"];?>" ><button type="button" class="btn" data-toggle="modal" data-placement="top" title="Eliminar Cliente" data-target="#borrarCliente"><img  src="../imagenes/borrar.png"></button></a>
                                          </td>
                                            
                                </tr>
    
<?php } ?> <!--Cierre del while-->
                            </tbody>
                        </table>
                    </div>
                </div></div>
            </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
  </body>
</html>