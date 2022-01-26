<!doctype html>
<html lang="es">
  <head>
    <title>Menú de comida</title>
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
      <div><h1 class="text-center">Menú de Comida</h1>
        <hr style="background: black;"></div>
    </div>

    <!--conexion a la base de datos-->
    <?php
                include('../php/conexionBD.php');
                $sql="SELECT * from mpstock";
                $resultado = $conexion ->query($sql);
                
            ?>

    <!--Cuerpo de la página-->
    <div class="container-fluid">
        <!--formulario Ingresar comida a DATABASE-->
        <form action="procesos/guardarMenuComida.php" method="POST" enctype="multipart/form-data">
            <div class="row bg-secondary p-3">
                <div class="col-lg-4">
                    <label class="text-light m-2">Producto</label>
                    <input type="text" class="form-control" name="comida" placeholder="Producto..." required>
                  </div>
                  <div class="col-lg-2">
                    <label class="text-light m-2">Codigo</label>
                    <input type="text" class="form-control" name="clave" placeholder="Código Producto..." required>
                  </div>
                  <div class="col-lg-2">
                    <label class="text-light m-2">Tamaño</label>
                    <input type="text" class="form-control" name="tamano" placeholder="Tamaño..." required>
                  </div>
                  <div class="col-lg-1">
                    <label class="text-light m-2">Precio</label>
                    <input type="text" class="form-control" name="precio" placeholder="Venta..." required>
                  </div>
                  <div class="col-lg-3">
                    <label class="text-light m-2">Imagen</label>
                    <input type="file" class="form-control" id="file" onchange="return fileValidation()" name="hojaDeVida">
                  </div>
        </div>
        <div class="col p-1"></div>
        <div class="col bg-secondary">
                <p class="text-light p-2">Ingredientes:</p>
            <div class="row p-1 text-light">
            <?php while ($fila = mysqli_fetch_array($resultado)){ ?>
                <div class="col-2"><label> <?php echo $fila["producto"];?> <input type="checkbox" name="checkbox[]" value="<?php echo $fila["producto"];?>"></label></div>
               <?php } ?> <!--Cierre del while--> 
            </div>
            
        </div>
            
                <div class="row">
                    <div class="col-lg-11"></div>
                    <div class="col p-2"><button type="submit" class="btn btn-danger p-3">Guardar</button></div>
                </div>
        </form>
    </div>
    <hr>

    <!--Muestra del menu de pizzeria en invetario-->
                <!--conexion con la base de datos-->
    <?php include('../php/conexionBD.php');
                $sql="SELECT * FROM menucomida";
                $resultado = $conexion ->query($sql);
                ?>
                <!--Inicio de la vista-->
    <div class="container-fluid">
        <div class="row">

                           
        <?php while ($fila = mysqli_fetch_array($resultado)){ ?>
            <div class="col-lg-4 border border-dark">
            
                <div class="col"> 
                
                    <div class="row">
                    
                        <div class="col text-center p-3"><img src="procesos/imagenes/<?php echo $fila["comida"];?>.png" style="width:160px"></div>
                        <div class="col p-3">
                            <h4><?php  echo $fila["comida"];?></h4>
                            <h5>Código: <?php  echo $fila["codigo"];?></h5>
                            <p>Tamaño: <?php  echo $fila["tamaño"];?></p>
                            <p>Precio: <?php  echo $fila["precio"];?></p>
                        </div>
                    </div>
                </div>
                <p>Ingredientes:</p>
                
            </div>
            <?php } ?> <!--Cierre del while-->
            
            
            
            
            
            
        </div>

    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>function fileValidation(){
        var fileInput = document.getElementById('file');
        var filePath = fileInput.value;
        var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
        if(!allowedExtensions.exec(filePath)){
            alert('Seleccione archivos con extensión  .jpeg/.jpg/.png/.gif');
            fileInput.value = '';
            return false;
        }else{
            //Image preview
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }</script>
  </body>
</html>