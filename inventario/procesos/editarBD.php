<?php

include('../../php/conexionBD.php');

    $id = $_POST["id"];
    $producto = $_POST["producto"];
    $unidades = $_POST["unidades"];
    $precioCompra = $_POST["precioCompra"];
    $minimas = $_POST["minimas"];
    $idProveedor = $_POST["idProveedor"];

    $sql = "UPDATE mpstock SET producto = '$producto', unidades = '$unidades', precioCompra = '$precioCompra', minimas = '$minimas', idproveedor='$idProveedor' WHERE idProducto ='$id'";
    $ejecutar = mysqli_query($conexion,$sql);

    if(!$ejecutar){
        ?>
        <script>
        alert("hubo un error");
        window.location="editarMP.php";
        </script>
        <?php
    }else{
        ?>
        <script>
        alert("Se guardaron correctamente los datos");
        window.location="../MP-stock.php";
        </script>
        <?php
    }
?>