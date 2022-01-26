<!doctype html>
<html lang="es">
  <head>
    <title>Caja</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!--css Prueba-->
  <link rel="stylesheet" href="cssPrueba/pizza.css" >
</head>
  <body>
  <?php 
  
  session_start();
  if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
  $granTotal = 0;

    if(isset($_GET["status"])){
      if($_GET["status"] === "1"){
  ?>
  <div class="alert alert-success">
							<strong>¡Correcto!</strong> Venta realizada correctamente
						</div>
      <?php 
          }else if($_GET["status"] === "2"){
      ?>
      <div class="alert alert-info">
							<strong>Venta cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong>Ok</strong> Producto quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El producto que buscas no existe
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong>El producto está agotado
						</div>
					<?php
				}else{
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
						</div>
					<?php
				}
			}
		?>

  <br>
      <!--contenedor arriba-->
    <div class="container-fluid">
        
            <!--Identificacion de cajero y Orden del cliente-->    
                <div class="row">
                  <div class="col-1"> <a href="../inicio.php"><button class=" btn text-left"><img src="../imagenes/casa-web.png" style="height: 35px; width: 35px;"></button></a></div>
                  <form method="post" action="agregarAlCarrito.php">       
                    <div class="col"><label>Código: <input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código"></label></div>
                    </form>
                    <div class="col"><h4>Orden #</h4></div>
                </div>
                <div class="row">
            <!--contenedor de carrito cliente-->         
                <div class="col-lg-10 table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center text-light">
                                <th>id</th>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Tamaño</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Vaciar<th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($_SESSION["carrito"] as $indice => $producto){ 
						                    $granTotal += $producto->total;
                            ?>
                            <tr class="text-center text-dark">
                                <td> <?php echo $producto -> idComida ?> </td>
                                <td> <?php echo $producto -> codigo ?> </td>
                                <td> <?php echo $producto -> comida ?> </td>
                                <td> <?php echo $producto -> tamaño ?> </td>
                                <td> <?php echo $producto -> precio ?> </td>
                                <td> <?php echo $producto -> cantidad ?> </td>
                                <td> <?php echo $producto -> total ?> </td>
                                <td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>">Quitar</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="col-lg-2 bg-dark text-light p-3">
                    <h1 class="text-center">Resultado</h1>
                    <hr style="background-color:white;">
                    <!--Manejo del dinero-->
                
<!--direccion-->           <form action="terminarVenta.php" method="POST" name="f">
            <input name="total" type="hidden" value ="<?php echo $granTotal;?>" id="num2" onchange="cal()" onkeyup="cal()">  
                    <div ><label >Total <h3>$ <?php echo $granTotal;?> </h3></label></div>            
                    <div><label >Efectivo <input class="col" type="number" id="num1" onchange="cal()" onkeyup="cal()" required></label></div>
                    <div><label >Cambio <input class="col" type="number" name="resta" readonly="readonly" disabled></label></div>
                    <hr style="background-color:white;">
                    <div class="col"><button type="submit" class="btn btn-success">Terminar venta</button></div>
                    <div class="col p-3"><a href="cancelarVenta.php" class="btn btn-danger">Cancelar venta</a></div>
			              
                </form>         
                </div>
            </div>
    </div>
<hr>
    <!--contenedor Abajo-->
            <!--conexion con la base de datos-->
                <?php 
                  include('../php/conexionBD.php');
                  $sql="SELECT * FROM menucomida";
                  $resultado = $conexion ->query($sql);
                ?>
<div class="container-fluid">
<div class="row ">
    <!--Lista de los alimentos en menú-->
    
    <div class="col bg-dark text-center ">
        <h3 class="text-light m-2 p-2">Listado de Productos</h3>
        
            <div class="col">
        <div class="row"><?php while ($fila = mysqli_fetch_array($resultado)){ ?>
            <div class="col-lg-3">
            
                <div class="col bg-light">
                    <h4 class="p-3"><?php echo $fila["comida"];?></h4>
                    <img src="../inventario/procesos/imagenes/<?php echo $fila["comida"];?>.png">
                    <h5 class="p-3">Código: <?php echo $fila["idComida"];?> </h5>
                </div>
            
            </div><?php } ?> <!--Cierre del while-->
        </div>
    </div>
    </div>





</div>
</div>





<!-- Modales -->
<!--Modal descripcion de pizzas-->
<div class="modal fade" id="modalComida" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Peperoni</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h5>Descripción:</h5>
          <p>El pepperoni''' es una variedad estadounidense de salami, hecho de carne de cerdo curada y carne de res mezclado y sazonado con pimentón u otro ají.​​El pepperoni es característicamente suave, ligeramente ahumado y de color rojo brillante.​</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Generar</button>
        </div>
      </div>
    </div>
  </div>

  <!--Modal Pregunta Domicilio-->
<div class="modal fade" id="aDomicilio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Importante</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
          <p>¿Es un Pedido a Domicilio?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary">No</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#datosCliente" >Si</button>
        </div>
      </div>
    </div>
  </div>

    <!--Modal Cancelar venta-->
<div class="modal fade" id="cancelarVenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cancelar Venta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
          <h6>¿Esta seguro que desea cancelar la venta?</h6>
          <p>Se borran todos los productos en lista</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary">No</button>
          <button type="button" class="btn btn-primary">Si</button>
        </div>
      </div>
    </div>
  </div>
<!--Modal llenado de datos cliente y direccion con los pedidos a domicilio-->

<div class="modal" id="datosCliente"   aria-labelledby="exampleModalCenterTitle" >
    <div class="modal-dialog" role="document"  >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Datos del Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nombre del cliente:</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="datoDireccion" class="col-form-label">Direccion:</label>
              <textarea class="form-control" id="datoDireccion"></textarea>
              <label for="datoTelefono" class="col-form-label">Telefono:</label>
              <input type="tel" class="form-control" id="datoTelefono"></textarea>
              
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Realizar Pedido</button>
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
      function cal() {
  try {
    var a = parseInt(document.f.num1.value),
        b = parseInt(document.f.num2.value);
    document.f.resta.value = a - b;
  } catch (e) {
  }
}
    </script>
  </body>
</html>