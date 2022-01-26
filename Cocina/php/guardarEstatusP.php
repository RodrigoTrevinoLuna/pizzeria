<?php 

include('../../php/conexionBD.php');

$comida = $_POST["comida"];
$idPV = $_POST["idPV" ];
$tamano = $_POST["tamano"];
$fecha = date('Y-m-d');

$sql= "INSERT INTO estatuspedido  VALUES ('null','$comida','$tamano','$fecha','$idPV')";

$ejecutar = mysqli_query($conexion,$sql);

if(!$ejecutar){
    ?>
    <script>
    alert("hubo un error");
    window.location='../ordenesPedido.php'; 
    </script>
    <?php
}else{
    ?>
    <script>
    alert("Se guardaron correctamente los datos");
    window.location='../ordenesPedido.php'; 
    </script>
    <?php
}

?>