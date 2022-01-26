<!doctype html>
<html lang="es">
  <head>
    <title>En Stock</title>
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
        <button type="button" class=" list-group-item list-group-item-action bg-light" data-toggle="modal" data-target="#validacionAdmin">Usuarios</button>
        <button type="button" class=" list-group-item list-group-item-action bg-light" data-toggle="modal" data-target="#validacionadminProveedor">Proveedores</button>
      </div>
    </div>
<!--conexion a la base de datos-->
<?php
                include('../php/conexionBD.php');
                $sql="SELECT * FROM mpstock,proveedor WHERE mpstock.idProveedor = proveedor.idProveedor";
                $resultado = $conexion ->query($sql);

                $sqla="SELECT * from proveedor";
                $resultadoa = $conexion ->query($sqla);
            ?>
<!--Contenido-->
  <div class="container-fluid" id="page-content-wrapper">

   
    <div class="col">
      <h1 class="text-center">Materia Prima en Stock</h1>
      <hr style="background: black;">
    </div>
    
    <!--Ingresar productos al inventario-->
    <div class="container-fluid bg-secondary">
      <h4 class="text-light m-1 p-2">Ingresar Nuevo Artículo</h4>
      <form action="procesos/guardar.php" method="post">
        <div class="row">
          <div class="col-lg-2">
          <label class="text-light m-2">Producto</label>
          <input type="text" class="form-control " name="producto" placeholder="Producto..." required>
        </div>
        <div class="col-lg-2">
          <label class="text-light m-2">Unidades/Porciones</label>
          <input type="number" class="form-control" name="unidades" placeholder="Unidades..." required>
        </div>
        <div class="col-lg-2">
          <label class="text-light m-2">Precio Compra</label>
          <input type="number" class="form-control" name="PCompra" placeholder="Precio Compra..." required>
        </div>
        <div class="col-lg-2">
          <label class="text-light m-2">Cantidad a Surtir</label>
          <input type="number" class="form-control" name="minima" placeholder="Cantidad a Surtir" required>
        </div>
        <div class="col-lg-2">
          <label class="text-light m-2">Proveedores</label>
          <select class="col p-1 m-1" name="idProveedor">
          <?php while ($filaa = mysqli_fetch_array($resultadoa)){ ?>
          <option value="" selected  hidden disabled>Seleccione Uno:</option>
            <option value="<?php echo $filaa["idProveedor"];?>"><?php echo $filaa["proveedor"];?></option>
            <?php } ?> <!--Cierre del while-->
          </select>
        </div>
        
          <div class="col"><button class="btn btn-danger  p-2 m-4" type="submit">Guardar</button></div>
      </form>

      
    </div>
  </div>
    
    <hr>
    
    <div class="container-fluid bg-secondary">
    
        <div class="text-right p-2">
      <label class="text-light">Buscar: <input type="text" id="search"></label> <!--Buscar elementos en la tabla-->
    </div>
<div class="table-wrapper-scroll-y my-custom-scrollbar">
      <table class="table table-striped text-light text-center" id="mytable">
        <!--Estilos del scroll de la tabla => simple-sidebar.css -->
        <thead >
          <tr>
            <th>Nombre del Producto</th>
            <th>Unidades / Porciones</th>
            <th>Precio Compra</th>
            <th>Cantidad Económica a Surtir</th>
            <th>Proveedor</th>
            <th>Opción</th>
            
          </tr>
          </thead>
          <tbody>
              <tr>
              <?php while ($fila = mysqli_fetch_array($resultado)){ ?>
                <td> <?php  echo $fila["producto"];?> </td>
                <td> <?php  echo $fila["unidades"];?> </td>
                <td> <?php  echo $fila["precioCompra"];?> </td>
                <td> <?php  echo $fila["minimas"];?> </td>
                <td> <?php  echo $fila["proveedor"]?> </td>
                <td> <a href="procesos/editarMP.php?id=<?php  echo $fila["idProducto"];?>"><button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Editar Cliente"><img  src="../imagenes/editar.png"></button></a>  
                  <a href="procesos/eliminarMP.php?id=<?php  echo $fila["idProducto"];?>"><button type="button" class="btn"  data-placement="top" title="Eliminar Cliente" ><img  src="../imagenes/borrar.png"></button></td></a>
              </tr>
              <?php } ?> <!--Cierre del while-->
          </tbody>
      </table>
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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