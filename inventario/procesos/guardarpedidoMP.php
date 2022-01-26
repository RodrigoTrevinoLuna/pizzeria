<?php 
    include("../../php/conexionBD.php");
$producto = $_POST["producto"];
$proveedor = $_POST["proveedor"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$direccion = $_POST["direccion"];
$pedido = $_POST["pedido"];

$sql= "INSERT INTO pdf  VALUES ('null','$producto','$proveedor','$telefono','$correo','$direccion','$pedido')";
$ejecutar = mysqli_query($conexion,$sql);

if(!$ejecutar){
    ?>
    <script>
    alert("hubo un error al generar el pdf");
    window.location='../AbastMP.php'; 
    </script>
    <?php
}else{
    ?>
    <script>
    alert("Se guardaron correctamente los datos");
    window.location='pdf.php'; 
    </script>
    <?php
}

?>
?>