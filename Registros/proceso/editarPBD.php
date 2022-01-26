<?php
    $id = $_POST["id"];
    $proveedor = $_POST["proveedor"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];


    include('../../php/conexionBD.php');

    $sql= "UPDATE  proveedor  SET proveedor = '$proveedor', telefono = '$telefono', correo = '$correo', direccion = '$direccion' WHERE idProveedor ='$id'";
    $ejecutar = mysqli_query($conexion,$sql);

    if(!$ejecutar){
        ?>
        <script>
        alert("Hubo un error");
        window.location="../proveedores.php";
        </script>
        <?php
    }else{
        ?>
        <script>
        alert("Se Guardaron Correctamente los Cambios");
        window.location="../proveedores.php";
        </script>
        <?php
    }
?>