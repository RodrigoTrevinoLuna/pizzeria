<?php
    include('../../php/conexionBD.php');

$producto = $_POST["producto"];
$unidades = $_POST["unidades" ];
$PCompra = $_POST["PCompra"];
$minima = $_POST["minima"];
$idProveedor = $_POST["idProveedor"];

$sql= "INSERT INTO mpstock  VALUES ('$producto','$unidades','$PCompra', null ,'$minima','$idProveedor')";

$ejecutar = mysqli_query($conexion,$sql);

if(!$ejecutar){
    ?>
    <script>
    alert("hubo un error");
    window.location='../MP-Stock.php'; 
    </script>
    <?php
}else{
    ?>
    <script>
    alert("Se guardaron correctamente los datos");
    window.location='../MP-Stock.php';
    </script>
    <?php
}

?>