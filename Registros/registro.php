<?php
    include('../php/conexionBD.php');

$nombre = $_POST["nombre"];
$usuario = $_POST["usuario" ];
$password = $_POST["password"];
$nivelAcceso = $_POST["nivelAcceso"];

$sql= "INSERT INTO usuario  VALUES ('null','$nombre','$usuario','$password','$nivelAcceso')";

$ejecutar = mysqli_query($conexion,$sql);

if(!$ejecutar){
    ?>
    <script>
    alert("hubo un error");
    window.location='usuario.php'; 
    </script>
    <?php
}else{
    ?>
    <script>
    alert("Se guardaron correctamente los datos");
    window.location='usuario.php'; 
    </script>
    <?php
}

?>